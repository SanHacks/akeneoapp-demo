<?php

declare(strict_types=1);

namespace App\Client;

use App\Entity\Exception\AccessTokenNotFoundException;
use App\Repository\TokenRepository;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

class ClientFactory implements ClientFactoryInterface
{
    public function __construct(
        private readonly string $pimUrl,
        private readonly TokenRepository $tokenRepository,
        private readonly string $dockerVersion,
        private readonly string $applicationVersion
    ) {
    }

    /**
     * @throws AccessTokenNotFoundException
     */
    public function create(): ClientInterface
    {
        if($this->tokenRepository->hasToken()) {

            $userAgent = 'AkeneoSampleApp/php-symfony';
            $userAgent .= ($this->applicationVersion) ? ' Version/' . $this->applicationVersion : '';
            $userAgent .= ($this->dockerVersion) ? ' Docker/' . $this->dockerVersion : '';

            return new Client([
                'base_uri' => $this->pimUrl,
                'headers' => [
                    'Authorization' =>sprintf("Bearer %s", $this->tokenRepository->getToken()->getAccessToken()),
                    'User-Agent' => $userAgent
                ]
            ]);
        }
        return new Client();
    }
}
