<?php declare(strict_types=1);

namespace ApiClients\Tools\Psr7\HttpStatusExceptions;

use Exception;
use Psr\Http\Message\ResponseInterface;

final class SwitchingProtocolsException extends AbstractException
{
    public static function create(ResponseInterface $response, Exception $exception = null)
    {
        return (new self('Switching Protocols', 101, $exception))->setResponse($response);
    }
}
