<?php

namespace App\Tests;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

abstract class RepositoryTestCase extends KernelTestCase
{
    /**
     * @var EntityManagerInterface
     */
    protected $manager;

    protected function setUp()
    {
        parent::setUp();

        $this->manager = self::bootKernel()->getContainer()->get(EntityManagerInterface::class);
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown()
    {
        $this->manager->close();
        $this->manager = null;

        parent::tearDown();
    }
}
