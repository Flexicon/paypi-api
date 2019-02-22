<?php

namespace App\Validator\Constraints;

use App\Dictionary\TransactionStatusDictionary;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

class FilterStatusValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof FilterStatus) {
            throw new UnexpectedTypeException($constraint, FilterStatus::class);
        }

        if (null === $value || '' === $value) {
            return;
        }

        if (!is_string($value)) {
            throw new UnexpectedValueException($value, 'string');
        }

        if (!in_array($value, TransactionStatusDictionary::getStatuses())) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $value)
                ->setParameter('{{ accepted }}', join(', ', TransactionStatusDictionary::getStatuses()))
                ->addViolation();
        }
    }
}