<?php

namespace App\Setup;

use App\Entity\City;
use Doctrine\ORM\EntityManagerInterface;
use League\Csv\Reader;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class GeocoderSetupStep implements SetupStepInterface
{
    private $manager;
    private $imported = 0;

    public function __construct(EntityManagerInterface $em)
    {
        $this->manager = $em;
    }

    public function getOrder(): int
    {
        return 3;
    }

    public function getName(): string
    {
        return 'Preparing the local geocoder';
    }

    public function execute(OutputInterface $output): void
    {
        $this->imported = 0;

        $finder = new Finder();
        $finder->in(__DIR__.'/../Geography/Resources/data');
        $finder->sortByName();
        $finder->directories();

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
