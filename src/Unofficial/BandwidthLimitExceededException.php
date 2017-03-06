<?php declare(strict_types=1);

namespace ApiClients\Tools\Psr7\HttpStatusExceptions\Unofficial;

use ApiClients\Tools\Psr7\HttpStatusExceptions\AbstractException;
use Exception;
use Psr\Http\Message\ResponseInterface;

final class BandwidthLimitExceededException extends AbstractException
{
    public static function create(ResponseInterface $response, Exception $exception = null)
    {
        return (new self('Bandwidth Limit Exceeded', 509, $exception))->setResponse($response);
    }
}
