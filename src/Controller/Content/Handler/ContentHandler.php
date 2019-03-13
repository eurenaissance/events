<?php

namespace App\Controller\Content\Handler;

use App\Repository\ContentRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class ContentHandler
{
    private const DEFAULT_TEMPLATE = 'to_implement.html.twig';
    private const CONTENT_TEMPLATE = 'content/content.html.twig';
    /**
     * @var ContentRepository
     */
    private $repository;
    /**
     * @var Environment
     */
    private $environment;

    public function __construct(ContentRepository $repository, Environment $environment)
    {
        $this->repository = $repository;
        $this->environment = $environment;
    }

    public function handle(Request $request): Response
    {
        $template = self::DEFAULT_TEMPLATE;
        $params = [];
        try {
            if ($content = $this->repository->findOneByUrl($request->getRequestUri())) {
                $template = self::CONTENT_TEMPLATE;
                $params['content'] = $content;
            }
        } catch (\Exception $e) {
        }

        return new Response($this->environment->render($template, $params));
    }
}
