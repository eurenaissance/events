<?php

namespace App\Command;

use App\Entity\City;
use App\Repository\ActorRepository;
use App\Repository\GroupRepository;
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
    private $actorRepository;
    private $groupRepository;

    private $imported = 0;

    public function __construct(
        EntityManagerInterface $manager,
        ActorRepository $actorRepository,
        GroupRepository $groupRepository
    ) {
        parent::__construct();

        $this->manager = $manager;
        $this->actorRepository = $actorRepository;
        $this->groupRepository = $groupRepository;
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
        if ($filterCountry = $input->getOption('country')) {
            $output->writeln("└ Limiting the import to $filterCountry");
        }

        if ($this->hasActors($filterCountry)) {
            $output->writeln('This command cannot be run if some actors are already registered.');

            return 1;
        }

        if ($this->hasGroups($filterCountry)) {
            $output->writeln('This command cannot be run if some groups are already registered.');

            return;
        }

        $finder = new Finder();
        $finder->in(__DIR__.'/../Geography/Resources/data');
        $finder->sortByName();
        $finder->directories();
        if ($filterCountry) {
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

    private function hasActors(?string $filterCountry): int
    {
        $qb = $this
            ->actorRepository
            ->createQueryBuilder('a')
            ->select('COUNT(a)')
        ;

        if ($filterCountry) {
            $qb
                ->innerJoin('a.city', 'c')
                ->where('c.country = :country')
                ->setParameter('country', $filterCountry)
            ;
        }

        return 0 !== $qb->getQuery()->getSingleScalarResult();
    }

    private function hasGroups(?string $filterCountry): int
    {
        $qb = $this
            ->groupRepository
            ->createQueryBuilder('g')
            ->select('COUNT(g)')
        ;

        if ($filterCountry) {
            $qb
                ->innerJoin('g.city', 'c')
                ->where('c.country = :country')
                ->setParameter('country', $filterCountry)
            ;
        }

        return 0 !== $qb->getQuery()->getSingleScalarResult();
    }
}
