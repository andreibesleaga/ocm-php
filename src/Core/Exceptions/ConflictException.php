<?php

namespace Ocm\Core\Exceptions;

class ConflictException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Ocm Conflict Exception';
}
