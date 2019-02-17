<?php

namespace App\Services;

use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormErrorIterator;
use Symfony\Component\Form\FormInterface;

final class FormErrorResponseBuilder
{
    /**
     * Reads FormInterface errors and builds an associative array of fields and error messages
     *
     * @param FormInterface $form
     *
     * @return array
     */
    public function build(FormInterface $form)
    {
        $errorFields = [];

        if ($form->getErrors()->count() > 0) {
            $this->assignErrorsToArray($errorFields, $form->getErrors());
        }

        /** @var FormInterface $field */
        foreach ($form as $field) {
            $errorMessages = [];
            $this->assignErrorsToArray($errorMessages, $field->getErrors());

            if ($field->count() > 0) {
                $errorMessages = array_merge($errorMessages, $this->build($field));
            }

            if (count($errorMessages) > 0) {
                $errorFields[$field->getName()] = $errorMessages;
            }
        }

        return $errorFields;
    }

    /**
     * @param array $array
     * @param FormErrorIterator $errors
     */
    private function assignErrorsToArray(array &$array, FormErrorIterator $errors): void
    {
        /** @var FormError $error */
        foreach ($errors as $error) {
            $constraint = $error->getCause()->getConstraint();
            $array[$this->parseClassname(get_class($constraint))] = $error->getMessage();
        }
    }

    /**
     * Parses a fully qualified classname and returns only the lowest level class name
     *
     * @param string $className
     *
     * @return string
     */
    private function parseClassname($className): string
    {
        return join('', array_slice(explode('\\', $className), -1));
    }
}
