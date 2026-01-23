<?php

namespace Ocm\Core\Exceptions;

class InternalServerException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Ocm Internal Server Exception';
}
