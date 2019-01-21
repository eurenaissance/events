<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

abstract class CommandTestCase extends KernelTestCase
{
    /**
     * @var Application
     */
    protected $application;

    protected function setUp()
    {
        static::bootKernel();

        $this->application = new Application(static::$kernel);
    }

    protected function tearDown()
    {
        parent::tearDown();

        $this->application = null;
    }

    /**
     * Helper to get a service.
     *
     * @param string $name
     *
     * @return mixed
     */
    protected function get(string $name)
    {
        return self::$container->get($name);
    }

    protected function executeCommand(string $command, array $input = []): CommandTester
    {
        $command = $this->application->find($command);

        $commandTester = new CommandTester($command);
        $commandTester->execute(array_merge(['command' => $command->getName()], $input));

        return $commandTester;
    }

    protected function assertCommandFailure(CommandTester $commandTester): void
    {
        $this->assertSame(1, $commandTester->getStatusCode());
    }

    protected function assertCommandSuccess(CommandTester $commandTester): void
    {
        $this->assertSame(0, $commandTester->getStatusCode());
    }

    protected function assertOutputContains(string $expected, CommandTester $commandTester): void
    {
        $this->assertContains($expected, $commandTester->getDisplay());
    }
}
