<?php declare(strict_types=1);

namespace ApiClients\Tools\Psr7\HttpStatusExceptions;

use ApiClients\Tools\Psr7\HttpStatusExceptions\Unofficial;
use Exception as CoreException;
use Psr\Http\Message\ResponseInterface;
use function React\Promise\reject;

final class ExceptionFactory
{
    const STATUS_CODE_EXCEPTION_MAP = [
        /**
         * 1xx codes
         */
        100 => ContinueException::class,
        101 => SwitchingProtocolsException::class,
        102 => ProcessingException::class,

        /**
         * 2xx codes
         */
        200 => OKException::class,
        201 => CreatedException::class,
        202 => AcceptedException::class,
        203 => NonAuthoritativeInformationException::class,
        204 => NoContentException::class,
        205 => ResetContentException::class,
        206 => PartialContentException::class,
        207 => MultiStatusException::class,
        208 => AlreadyReportedException::class,
        226 => IMUsedException::class,

        /**
         * 3xx codes
         */
        300 => MultiChoicesException::class,
        301 => MovedPermanentlyException::class,
        302 => FoundException::class,
        303 => SeeOtherException::class,
        304 => NotModifiedException::class,
        305 => UseProxyException::class,
        306 => SwitchProxyException::class,
        307 => TemporaryRedirectException::class,
        308 => PermanentRedirectException::class,

        /**
         * 4xx codes
         */
        400 => BadRequestException::class,
        401 => UnauthorizedException::class,
        402 => PaymentRequiredException::class,
        403 => ForbiddenException::class,
        404 => NotFoundException::class,
        405 => MethodNotAllowedException::class,
        406 => NotAcceptableException::class,
        407 => ProxyAuthenticationRequiredException::class,
        408 => RequestTimeoutException::class,
        409 => ConflictException::class,
        410 => GoneException::class,
        411 => LengthRequiredException::class,
        412 => PreconditionFailedException::class,
        413 => PayloadTooLargeException::class,
        414 => URITooLongException::class,
        415 => UnsupportedMediaTypeException::class,
        416 => RangeNotSatisfiableException::class,
        417 => ExpectationFailedException::class,
        418 => ImATeapotException::class,
        421 => MisdirectedRequestException::class,
        422 => UnprocessableEntityException::class,
        423 => LockedException::class,
        424 => FailedDependencyException::class,
        426 => UpgradeRequiredException::class,
        428 => PreconditionRequiredException::class,
        429 => TooManyRequestsException::class,
        431 => RequestHeaderFieldsTooLargeException::class,
        451 => UnavailableForLegalReasonsException::class,

        /**
         * 5xx codes
         */
        500 => InternalServerErrorException::class,
        501 => NotImplementedException::class,
        502 => BadGatewayException::class,
        503 => ServiceUnavailableException::class,
        504 => GatewayTimeoutException::class,
        505 => HTTPVersionNotSupportedException::class,
        506 => VariantAlsoNegotiatesException::class,
        507 => InsufficientStorageException::class,
        508 => LoopDetectedException::class,
        510 => NotExtendedException::class,
        511 => NetworkAuthenticationRequiredException::class,

        /**
         * IIS (Unofficial)
         *
         * Excluding the 451 as it conflicts with the official 451 code.
         */
        440 => Unofficial\IIS\LoginTimeoutException::class,
        449 => Unofficial\IIS\RetryWithException::class,

        /**
         * Cloudflare (Unofficial)
         */
        520 => Unofficial\Cloudflare\UnknownErrorException::class,
        521 => Unofficial\Cloudflare\WebServerIsDownException::class,
        522 => Unofficial\Cloudflare\ConnectionTimedOutException::class,
        523 => Unofficial\Cloudflare\OriginIsUnreachableException::class,
        524 => Unofficial\Cloudflare\ATimeoutOccurredException::class,
        525 => Unofficial\Cloudflare\SSLHandshakeFailedException::class,
        526 => Unofficial\Cloudflare\InvalidSSLCertificateException::class,
        527 => Unofficial\Cloudflare\RailgunErrorException::class,
    ];

    public static function create(ResponseInterface $response, CoreException $previousException)
    {
        $exception = static::STATUS_CODE_EXCEPTION_MAP[$response->getStatusCode()];
        return $exception::create($response, $previousException);
    }
}
