<?php

namespace Ocm\Core\Exceptions;

class BadRequestException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Ocm Bad Request Exception';
}
