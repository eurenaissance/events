<?php

namespace App\DataFixtures;

use App\Entity\Content;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ContentFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $content1 = $this->create(
            'Legalities',
            '',
            '/page/legalities'
        );

        $content2 = $this->create(
            'Terms of Service',
            '',
            '/page/terms'
        );

        $content3 = $this->create(
            'Privacy Policy',
            '',
            '/page/privacy'
        );

        $manager->persist($content1);
        $manager->persist($content2);
        $manager->persist($content3);

        $manager->flush();
    }

    private function create(
        string $title,
        string $content,
        string $url
    ): Content {
        $page = new Content();

        $page->setContent($content);
        $page->setTitle($title);
        $page->setUrl($url);

        return $page;
    }
}
