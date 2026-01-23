<?php

namespace Ocm\Core\Exceptions;

class RateLimitException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Ocm Rate Limit Exception';
}
