<?php

namespace App\Validator\Constraints;

use App\Dictionary\MethodTypeDictionary;
use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class MethodTypes extends Constraint
{
    public $message = 'Type "{{ value }}" is invalid. Accepted values: {{ accepted }}.';
}