<?php

namespace App\Setup;

use Symfony\Component\Console\Output\OutputInterface;

interface SetupStepInterface
{
    /**
     * Return this setup step execution order.
     *
     * @return int
     */
    public function getOrder(): int;

    /**
     * Return this setup step name (displayed during the setup phase).
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Execute the setup step.
     *
     * @param OutputInterface $io
     */
    public function execute(OutputInterface $output): void;
}
