<?php

namespace App\Command;

use App\Entity\City;
use App\Repository\ActorRepository;
use Doctrine\ORM\EntityManagerInterface;
use League\Csv\Reader;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class GeocoderSetupCommand extends Command
{
    protected static $defaultName = 'app:geocoder:setup';

    private $manager;
    private $actionRepository;

    private $imported = 0;

    public function __construct(EntityManagerInterface $manager, ActorRepository $actorRepository)
    {
        parent::__construct();

        $this->manager = $manager;
        $this->actionRepository = $actorRepository;
    }

    protected function configure(): void
    {
        $this
            ->setDescription(
                'Prepare the Geocoder database for usage. '.
                'This command cannot be run if some actors are already registered.'
            )
            ->addOption(
                'country',
                null,
                InputOption::VALUE_OPTIONAL,
                'Limit the import to a specific country code.'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (0 !== $this->actionRepository->count([])) {
            $output->writeln('This command cannot be run if some actors are already registered.');

            return 1;
        }

        $finder = new Finder();
        $finder->in(__DIR__.'/../Geocoder/data');
        $finder->sortByName();
        $finder->directories();

        if ($filterCountry = $input->getOption('country')) {
            $output->writeln("└ Limiting the import to $filterCountry");
            $finder->name($filterCountry);
        }

        foreach ($finder as $file) {
            try {
                $output->writeln('└ Starting to import country '.$file->getFilename());
                $output->writeln('    └ Starting transaction');
                $this->manager->beginTransaction();

                $output->writeln('    └ Deleting legacy cities');
                $this->manager->createQuery('DELETE FROM '.City::class.' c WHERE c.country = :country')
                    ->execute(['country' => $file->getFilename()]);

                $output->writeln('    └ Importing territories');
                foreach ((new Finder())->in($file->getPathname())->name('*.txt')->sortByName() as $territory) {
                    $output->writeln('        └ Importing territory '.$territory->getFilename());
                    $this->importFile($territory, $output);
                }

                $output->writeln('    └ Committing transaction');
                $this->manager->commit();
            } catch (\Throwable $t) {
                $output->writeln('    └ Error catched, rolling back transaction');
                $this->manager->rollback();

                throw $t;
            }
        }

        $output->writeln("\n".$this->imported.' postal codes imported.');

        return 0;
    }

    private function importFile(SplFileInfo $file, OutputInterface $output): void
    {
        $csv = Reader::createFromPath($file->getPathname());
        $csv->setDelimiter("\t");

        $progress = new ProgressBar($output, $csv->count());

        foreach ($csv->getRecords() as $record) {
            $this->manager->persist(new City(
                Uuid::uuid4(),
                $file->getBasename('.'.$file->getExtension()),
                $record[2],
                $record[1],
                $record[9],
                $record[10]
            ));

            ++$this->imported;

            if (0 === ($this->imported % 250)) {
                $progress->advance(250);

                $this->manager->flush();
                $this->manager->clear();
            }
        }

        $progress->finish();
        $output->write("\n");

        $this->manager->flush();
        $this->manager->clear();
    }
}
