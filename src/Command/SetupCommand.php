<?php

namespace App\Command;

use App\Repository\ActorRepository;
use App\Repository\GroupRepository;
use App\Setup\SetupStepInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SetupCommand extends Command
{
    private $steps;
    private $actorRepository;
    private $groupRepository;

    public function __construct(iterable $steps, ActorRepository $actorRepo, GroupRepository $groupRepo)
    {
        parent::__construct();

        $this->steps = $steps;
        $this->actorRepository = $actorRepo;
        $this->groupRepository = $groupRepo;
    }

    protected function configure(): void
    {
        $this
            ->setName('app:setup')
            ->setDescription(
                'Launch the initial setup of the platform. '.
                'This command cannot be run if there are actors or groups already created.'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ($this->hasActors()) {
            $output->writeln('This command cannot be run if some actors are already registered.');

            return 1;
        }

        if ($this->hasGroups()) {
            $output->writeln('This command cannot be run if some groups are already registered.');

            return 2;
        }

        $output->writeln('Starting the setup ...');

        $steps = [];
        $orders = [];

        /** @var SetupStepInterface $step */
        foreach ($this->steps as $step) {
            $orders[] = $step->getOrder();
            $steps[] = $step;
        }

        array_multisort($orders, SORT_ASC, $steps);

        foreach ($steps as $i => $step) {
            $output->writeln("\n".($i + 1).'. '.$step->getName()."\n===================================");
            $step->execute($output);
        }

        $output->writeln('Platform installed successfully.');

        return 0;
    }

    private function hasActors(): bool
    {
        $count = $this->actorRepository
            ->createQueryBuilder('a')
            ->select('COUNT(a)')
            ->getQuery()
            ->getSingleScalarResult()
        ;

        return 0 !== $count;
    }

    private function hasGroups(): bool
    {
        $count = $this->groupRepository
            ->createQueryBuilder('g')
            ->select('COUNT(g)')
            ->getQuery()
            ->getSingleScalarResult()
        ;

        return 0 !== $count;
    }
}
