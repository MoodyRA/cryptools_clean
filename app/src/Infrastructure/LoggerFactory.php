<?php

declare(strict_types = 1);

namespace Cryptools\Infrastructure;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Container\ContainerInterface;

class LoggerFactory
{
    /**
     * @param ContainerInterface $container
     * @return Logger
     */
    public function __invoke(ContainerInterface $container): Logger
    {
        $loggerConf = $container->get('config')['logger'];
        $logger = new Logger($loggerConf['name']);
        $logger->pushHandler(new StreamHandler($loggerConf['file']));
        return $logger;
    }
}