<?php

namespace App\Tests\Command;

use App\Repository\CityRepository;
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
        $this->assertOutputContains('This command can not be run if some actors are already registered.', $commandTester);
    }

    public function testExecuteSuccess(): void
    {
        $commandTester = $this->executeCommand('app:geocoder:setup', ['--country' => 'MT']);

        $this->assertCommandSuccess($commandTester);
        $this->assertOutputContains('73 postal codes imported.', $commandTester);
        $this->assertSame(73, $this->get(CityRepository::class)->count(['country' => 'MT']));
    }
}
