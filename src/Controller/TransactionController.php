<?php

namespace App\Controller;

use App\Form\TransactionType;
use App\Services\FormErrorResponseBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/transactions", name="transactions_")
 */
class TransactionController extends AbstractController
{
    /**
     * @Route(name="list", methods={"GET"})
     */
    public function list()
    {
        return $this->json([
            'data' => [],
        ]);
    }

    /**
     * @Route(name="create", methods={"POST"})
     *
     * @param Request $request
     * @param FormErrorResponseBuilder $errorResponseBuilder
     *
     * @return JsonResponse
     */
    public function create(Request $request, FormErrorResponseBuilder $errorResponseBuilder)
    {
        $form = $this->createForm(TransactionType::class);
        $data = $request->request->all();

        $form->submit($data);

        if ($form->isValid()) {
            dump($form->getData());
            return $this->json(['message' => 'form valid!']);
        }

        $errors = $errorResponseBuilder->build($form);

        return $this->json(['validation_messages' => $errors], Response::HTTP_BAD_REQUEST);
    }
}
