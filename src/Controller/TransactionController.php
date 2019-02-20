<?php

namespace App\Controller;

use App\DTOFactory\DTOFactory;
use App\Form\TransactionType;
use App\Repository\TransactionRepository;
use App\Services\FormErrorResponseBuilder;
use App\Services\TransactionService;
use FOS\RestBundle\Controller\Annotations as Rest;
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
     *
     * @Rest\QueryParam(name="limit", requirements="\d+", default="10")
     * @Rest\QueryParam(name="page", requirements="\d+", default="1")
     * @Rest\QueryParam(name="order", requirements="[a-z]+_[A-Z]{3,4}", default="id_ASC")
     *
     * @param int $limit
     * @param int $page
     * @param string $order
     * @param TransactionRepository $transactionRepository
     *
     * @return JsonResponse
     */
    public function list(
        int $limit,
        int $page,
        string $order,
        TransactionRepository $transactionRepository
    )
    {
        $transactions = $transactionRepository->findAll();
        $dtos = $this->responseDTOFactory->createDTOs($transactions);

        // TODO:: Implement list pagination DTO
        return $this->json([
            'pagination' => [
                'limit' => $limit,
                'page' => $page,
                'order' => [
                    'id' => 'ASC',
                ],
            ],
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
    public
    function create(
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
