<?php

namespace App\Controller;

use App\DTO\Request\ListFiltersDTO;
use App\DTO\Response\ListResponseDTO;
use App\DTO\Response\PaginationResponseDTO;
use App\DTOFactory\DTOFactory;
use App\Form\TransactionType;
use App\Services\FormErrorResponseBuilder;
use App\Services\TransactionService;
use App\Validator\Constraints;
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
     * @Rest\QueryParam(name="order", requirements="[a-zA-Z]+_[A-Z]{3,4}", default="id_ASC")
     * @Rest\QueryParam(name="filter", requirements=@Constraints\FilterStatus, nullable=true)
     *
     * @param int $limit
     * @param int $page
     * @param string $order
     * @param string $filter
     * @param TransactionService $transactionService
     *
     * @return JsonResponse
     */
    public function list(
        int $limit,
        int $page,
        string $order,
        ?string $filter,
        TransactionService $transactionService
    )
    {
        $filters = new ListFiltersDTO($page, $limit, $order, $filter);
        $paginator = $transactionService->getTransactionsListPaginator($filters);

        $transactionDTOs = $this->responseDTOFactory->createDTOs($paginator->getIterator()->getArrayCopy());
        $paginationDTO = new PaginationResponseDTO($filters->getPage(), $filters->getLimit(), $paginator->count(), $filters->getOrder());
        $listResponseDTO = new ListResponseDTO($paginationDTO, $transactionDTOs);

        return $this->json($listResponseDTO);
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

        return $this->json($dto);
    }
}
