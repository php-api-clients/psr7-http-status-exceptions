<?php declare(strict_types=1);

namespace ApiClients\Tools\Psr7\HttpStatusExceptions\Unofficial;

use ApiClients\Tools\Psr7\HttpStatusExceptions\AbstractException;
use Exception;
use Psr\Http\Message\ResponseInterface;

final class BlockedByWindowsParentalControlsException extends AbstractException
{
    public static function create(ResponseInterface $response, Exception $exception = null)
    {
        return (new self('Blocked by Windows Parental Controls', 450, $exception))->setResponse($response);
    }
}
