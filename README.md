# Intelligent Intern Default Log Bundle

The `intelligent-intern/default-log-bundle` provides a default logging implementation for the [Intelligent Intern Core Framework](https://github.com/Intelligent-Intern/core), ensuring basic logging functionality when no other logging strategy is installed.

## Installation

Install the bundle using Composer:

~~~bash
composer require intelligent-intern/default-log-bundle
~~~

## Configuration

Ensure the following secret is set in vault:

~~~env
secret/data/data/config:
  LOG_TARGET: default
~~~

## Usage

Once the bundle is installed and configured, the Core framework will dynamically detect the Default logging service via the `log.strategy` tag.

The service will be available via the `LoggerInterface`, which will be injected automatically. Here's an example with a `/logtest` route:

~~~php
<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class LoggingController extends AbstractController
{
    public function __construct(
        private LoggerInterface $logger
    ) {}

    #[Route('/logtest', name: 'log_test', methods: ['GET'])]
    public function logTest(): JsonResponse
    {
        try {
            $this->logger->info('Test log message from /logtest route.');

            return new JsonResponse(['message' => 'Log written successfully']);
        } catch (\Exception $e) {
            return new JsonResponse(['error' => $e->getMessage()], 500);
        }
    }
}
~~~

## Extensibility

This bundle is specifically designed to integrate with `intelligent-intern/core`. It leverages the dynamic service discovery mechanism to ensure seamless compatibility.

If you'd like to add additional logging strategies, simply create a similar bundle that implements the `LogServiceInterface` and tag its service with `log.strategy`.

For example:

~~~yaml
services:
  Your\CustomBundle\Service\CustomLogService:
    tags: ['log.strategy']
~~~

## License

This bundle is open-sourced software licensed under the [MIT license](LICENSE).
