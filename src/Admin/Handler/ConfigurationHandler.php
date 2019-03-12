<?php

namespace App\Admin\Handler;

use App\Entity\Configuration;
use App\ImageProvider\ImageStorageInterface;
use Doctrine\ORM\EntityManagerInterface;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ConfigurationHandler
{
    private const STORAGE_UPLOAD_DIR = 'uploads/configuration/';
    /**
     * @var EntityManagerInterface
     */
    private $manager;
    /**
     * @var ImageStorageInterface
     */
    private $storage;

    public function __construct(EntityManagerInterface $manager, ImageStorageInterface $storage)
    {
        $this->manager = $manager;
        $this->storage = $storage;
    }

    public function handle(FormInterface $form): Configuration
    {
        /** @var Configuration $configuration */
        $configuration = $form->getData();

        foreach ($form->all() as $name => $value) {
            if ($value->getData() instanceof UploadedFile) {
                /** @var UploadedFile $file */
                $file = $value->getData();
                $method = 'set'.ucfirst(str_replace('File', '', $name));
                if (method_exists($configuration, $method) && 0 === strpos($file->getMimeType(), 'image/')) {
                    $image = $this->storage->store(self::STORAGE_UPLOAD_DIR.Uuid::uuid4()->toString(), $file);
                    $configuration->$method($image->getFilename());
                }
            }
        }
        $this->manager->persist($configuration);
        $this->manager->flush();

        return $configuration;
    }
}
