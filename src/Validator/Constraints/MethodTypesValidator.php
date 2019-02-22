<?php

namespace App\Validator\Constraints;

use App\Dictionary\MethodTypeDictionary;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

class MethodTypesValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof MethodTypes) {
            throw new UnexpectedTypeException($constraint, MethodTypes::class);
        }

        if (null === $value || '' === $value) {
            return;
        }

        if (!is_string($value)) {
            throw new UnexpectedValueException($value, 'string');
        }

        if (!in_array($value, MethodTypeDictionary::getTypes())) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $value)
                ->setParameter('{{ accepted }}', join(', ', MethodTypeDictionary::getTypes()))
                ->addViolation();
        }
    }
}