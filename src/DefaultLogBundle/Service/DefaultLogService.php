<?php

namespace DefaultLogBundle\Service;

use App\Interface\LogServiceInterface;
use App\Service\VaultService;
use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Monolog\Logger;

class DefaultLogService implements LogServiceInterface
{
    private Logger $logger;

    public function __construct(VaultService $vaultService)
    {
        $this->logger = new Logger('default');
        $this->logger->pushHandler(new StreamHandler('php://stdout', Level::Debug));
    }

    public function supports(string $provider): bool
    {
        return $provider === 'default';
    }

    public function log(string $level, string $message, array $context = []): void
    {
        $this->logger->log($level, $message, $context);
    }

    public function setVaultService(VaultService $vaultService): void
    {
        // Satisfy the interface, though VaultService is not used in this implementation
    }
}
