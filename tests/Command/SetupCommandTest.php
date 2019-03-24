<?php

namespace App\Tests\Command;

use App\Repository\ActorRepository;
use App\Tests\CommandTestCase;

/**
 * @group functional
 */
class SetupCommandTest extends CommandTestCase
{
    public function testExecuteActorsAlreadyRegistered(): void
    {
        $commandTester = $this->executeCommand('app:setup', ['--dry-run' => true]);

        $this->assertCommandFailure($commandTester);
        $this->assertOutputContains('This command cannot be run if some actors are already registered.', $commandTester);
    }

    public function testExecuteSuccess(): void
    {
        /** @var ActorRepository $actorRepo */
        $actorRepo = $this->get(ActorRepository::class);
        $actorRepo->deleteAll();

        $commandTester = $this->executeCommand('app:setup', ['--dry-run' => true]);

        $this->assertCommandSuccess($commandTester);
        $this->assertOutputContains('Creating default configuration', $commandTester);
        $this->assertOutputContains('Preparing the local geocoder', $commandTester);
    }
}
