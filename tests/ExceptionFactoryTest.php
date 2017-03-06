<?php declare(strict_types=1);

namespace ApiClients\Tests\Tools\Psr7\HttpStatusExceptions;

use ApiClients\Tools\Psr7\HttpStatusExceptions;
use Exception as CoreException;
use ApiClients\Tools\TestUtilities\TestCase;
use Psr\Http\Message\ResponseInterface;
use RingCentral\Psr7\Response;

final class ExceptionFactoryTest extends TestCase
{
    public function provideExceptions()
    {
        foreach (HttpStatusExceptions\ExceptionFactory::STATUS_CODE_EXCEPTION_MAP as $code => $exception) {
            yield $this->createDataSet($code, $exception);
        }
    }

    private function createDataSet(int $code, string $exception)
    {
        $previousException = new CoreException('foo.bar');
        $response = new Response($code);
        $expectedException = $exception::create($response, $previousException);
        return [
            $code,
            $exception,
            $response,
            $previousException,
            $expectedException,
        ];
    }

    /**
     * @dataProvider provideExceptions
     */
    public function testCreate(
        int $code,
        string $exception,
        ResponseInterface $response,
        CoreException $previousException,
        CoreException $expectedException
    ) {
        /** @var HttpStatusExceptions\AbstractException $result */
        $result = HttpStatusExceptions\ExceptionFactory::create($response, $previousException);

        self::assertEquals($expectedException, $result);
        self::assertEquals($previousException, $result->getPrevious());
        self::assertEquals($code, $result->getCode());
        self::assertEquals($exception, get_class($result));
        self::assertInstanceOf(ResponseInterface::class, $result->getResponse());
        self::assertEquals($response, $result->getResponse());
    }
}
