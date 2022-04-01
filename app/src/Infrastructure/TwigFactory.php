<?php

namespace Cryptools\Infrastructure;

use Psr\Container\ContainerInterface;
use Slim\Views\Twig;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

/**
 * Instanciation de Twig pour le moteur de rendu
 */
class TwigFactory
{
    /**
     * @param ContainerInterface $container
     * @return Twig
     */
    public function __invoke(ContainerInterface $container): Twig
    {
        $loader = new FilesystemLoader($container->get('views.paths')['main']);
        $view = new Twig($loader, [
            'debug' => true
        ]);
        $view->addExtension(new DebugExtension());
        return $view;
    }
}