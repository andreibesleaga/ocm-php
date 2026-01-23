<?php

namespace Ocm\Core\Exceptions;

class UnprocessableEntityException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Ocm Unprocessable Entity Exception';
}
