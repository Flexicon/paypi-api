<?php

namespace App\Controller;

use App\Services\MethodsProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MethodsController extends AbstractController
{
    /**
     * @var MethodsProvider
     */
    private $methodsProvider;

    public function __construct(MethodsProvider $methodsProvider)
    {
        $this->methodsProvider = $methodsProvider;
    }

    /**
     * @Route("/methods", name="methods", methods={"GET"})
     */
    public function index()
    {
        return $this->json($this->methodsProvider->getMethods());
    }
}
