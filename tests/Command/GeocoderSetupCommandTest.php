<?php

namespace App\Tests\Command;

use App\Repository\ActorRepository;
use App\Repository\CityRepository;
use App\Repository\GroupRepository;
use App\Tests\CommandTestCase;

/**
 * @group functional
 */
class GeocoderSetupCommandTest extends CommandTestCase
{
    public function testExecuteFailure(): void
    {
        $commandTester = $this->executeCommand('app:geocoder:setup');

        $this->assertCommandFailure($commandTester);
        $this->assertOutputContains('This command cannot be run if some actors are already registered.', $commandTester);
    }

    public function testExecuteSuccess(): void
    {
        $this->get(GroupRepository::class)->deleteAll();
        $this->get(ActorRepository::class)->deleteAll();

        $commandTester = $this->executeCommand('app:geocoder:setup', ['--country' => 'MT']);

        $this->assertCommandSuccess($commandTester);
        $this->assertOutputContains('73 postal codes imported.', $commandTester);
        $this->assertSame(73, $this->get(CityRepository::class)->count(['country' => 'MT']));
    }
}
