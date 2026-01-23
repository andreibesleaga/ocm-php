<?php

namespace Ocm\Core\Exceptions;

class AuthenticationException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Ocm Authentication Exception';
}
