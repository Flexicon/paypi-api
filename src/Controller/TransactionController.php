<?php

namespace App\Controller;

use App\DTOFactory\DTOFactory;
use App\Form\TransactionType;
use App\Repository\TransactionRepository;
use App\Services\FormErrorResponseBuilder;
use App\Services\TransactionService;
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
     * @var DTOFactory
     */
    private $responseDTOFactory;

    public function __construct(DTOFactory $responseDTOFactory)
    {
        $this->responseDTOFactory = $responseDTOFactory;
    }

    /**
     * @Route(name="list", methods={"GET"})
     */
    public function list(TransactionRepository $transactionRepository)
    {
        $transactions = $transactionRepository->findAll();
        $dtos = $this->responseDTOFactory->createDTOs($transactions);

        return $this->json([
            'data' => $dtos,
        ]);
    }

    /**
     * @Route(name="create", methods={"POST"})
     *
     * @param Request $request
     * @param FormErrorResponseBuilder $errorResponseBuilder
     * @param TransactionService $transactionService
     *
     * @return JsonResponse
     *
     * @throws \Doctrine\ORM\ORMException
     */
    public function create(
        Request $request,
        FormErrorResponseBuilder $errorResponseBuilder,
        TransactionService $transactionService
    )
    {
        $data = $request->request->all();

        $form = $this->createForm(TransactionType::class);
        $form->submit($data);

        if (!$form->isValid()) {
            return $this->json($errorResponseBuilder->build($form, true), Response::HTTP_BAD_REQUEST);
        }

        $transaction = $transactionService->createTransaction($form->getData());
        $dto = $this->responseDTOFactory->createSingleDTO($transaction);

        return $this->json($dto, Response::HTTP_OK);
    }
}
