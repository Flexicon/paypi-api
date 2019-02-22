<?php

namespace App\Controller;

use App\DTOFactory\DTOFactory;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/users", name="users_")
 */
class UserController extends AbstractController
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
     * @Route("/{id}", name="details", methods={"GET"})
     *
     * @param User $user
     *
     * @return JsonResponse
     */
    public function create(User $user)
    {
        $dto = $this->responseDTOFactory->createSingleDTO($user);

        return $this->json($dto);
    }
}
