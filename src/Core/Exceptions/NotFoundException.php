<?php

namespace Ocm\Core\Exceptions;

class NotFoundException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Ocm Not Found Exception';
}
