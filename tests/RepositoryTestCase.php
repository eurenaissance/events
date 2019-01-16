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
        self::bootKernel();

        $this->manager = self::$container->get(EntityManagerInterface::class);
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
