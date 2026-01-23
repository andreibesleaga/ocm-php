<?php

namespace Ocm\Core\Exceptions;

class PermissionDeniedException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Ocm Permission Denied Exception';
}
