<?php declare(strict_types=1);

namespace ApiClients\Tools\Psr7\HttpStatusExceptions;

use Exception;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractException extends Exception
{
    /**
     * @var ResponseInterface
     */
    private $response;

    /**
     * @return ResponseInterface
     */
    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }

    /**
     * @param  ResponseInterface $response
     * @return AbstractException
     */
    protected function setResponse(ResponseInterface $response): AbstractException
    {
        $this->response = $response;

        return $this;
    }
}
