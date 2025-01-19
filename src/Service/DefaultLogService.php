<?php

namespace IntelligentIntern\DefaultLogBundle\Service;

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
        return strtolower($provider) === 'default';
    }

    public function log(string $level, string $message, array $context = []): void
    {
        $this->logger->log(Level::fromName(strtoupper($level)), $message, $context);
    }

    public function setVaultService(VaultService $vaultService): void
    {
        // No operation needed as VaultService is not used in this implementation
    }

    public function emergency(string $message, array $context = []): void
    {
        $this->logger->emergency($message, $context);
    }

    public function alert(string $message, array $context = []): void
    {
        $this->logger->alert($message, $context);
    }

    public function critical(string $message, array $context = []): void
    {
        $this->logger->critical($message, $context);
    }

    public function error(string $message, array $context = []): void
    {
        $this->logger->error($message, $context);
    }

    public function warning(string $message, array $context = []): void
    {
        $this->logger->warning($message, $context);
    }

    public function notice(string $message, array $context = []): void
    {
        $this->logger->notice($message, $context);
    }

    public function info(string $message, array $context = []): void
    {
        $this->logger->info($message, $context);
    }

    public function debug(string $message, array $context = []): void
    {
        $this->logger->debug($message, $context);
    }
}
