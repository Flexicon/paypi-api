<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class FilterStatus extends Constraint
{
    public $message = 'Filter "{{ value }}" is invalid. Accepted values: {{ accepted }}.';
}