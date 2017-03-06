<?php declare(strict_types=1);

namespace ApiClients\Tools\Psr7\HttpStatusExceptions\Unofficial\Cloudflare;

use ApiClients\Tools\Psr7\HttpStatusExceptions\AbstractException;
use Exception;
use Psr\Http\Message\ResponseInterface;

final class WebServerIsDownException extends AbstractException
{
    public static function create(ResponseInterface $response, Exception $exception = null)
    {
        return (new self('Web Server Is Down', 521, $exception))->setResponse($response);
    }
}
