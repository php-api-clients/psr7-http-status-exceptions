# PSR-7 response wrapping HTTP exceptions for PHP 7

[![Build Status](https://travis-ci.org/php-api-clients/psr7-http-status-exceptions.svg?branch=master)](https://travis-ci.org/php-api-clients/psr7-http-status-exceptions)
[![Latest Stable Version](https://poser.pugx.org/api-clients/psr7-http-status-exceptions/v/stable.png)](https://packagist.org/packages/api-clients/psr7-http-status-exceptions)
[![Total Downloads](https://poser.pugx.org/api-clients/psr7-http-status-exceptions/downloads.png)](https://packagist.org/packages/api-clients/psr7-http-status-exceptions)
[![Code Coverage](https://scrutinizer-ci.com/g/php-api-clients/psr7-http-status-exceptions/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/php-api-clients/psr7-http-status-exceptions/?branch=master)
[![License](https://poser.pugx.org/api-clients/psr7-http-status-exceptions/license.png)](https://packagist.org/packages/api-clients/psr7-http-status-exceptions)
[![PHP 7 ready](http://php7ready.timesplinter.ch/php-api-clients/psr7-http-status-exceptions/badge.svg)](https://travis-ci.org/php-api-clients/psr7-http-status-exceptions)

# Installation

To install via [Composer](http://getcomposer.org/), use the command below, it will automatically detect the latest version and bind it with `^`.

```
composer require api-clients/psr7-http-status-exceptions 
```
# Usage

This package includes a factory to create a new exception based on a response and previous exception:

```php
$exception ExceptionFactory::create($response, $previousException);
```

# License

The MIT License (MIT)

Copyright (c) 2016 Cees-Jan Kiewiet

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
