<?php

namespace App\Controller;

use App\Service\WatchService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WatchController extends AbstractController
{
    private WatchService $watchService;

    /**
     * WatchController constructor.
     * @param WatchService $watchService
     */
    public function __construct(WatchService $watchService)
    {
        $this->watchService = $watchService;
    }

    /**
     * @Route("/watch/{id}", requirements={"id":"\d+"}, methods={"GET"})
     *
     * @param int $id
     * @return Response
     */
    public function getAction(int $id): Response
    {
        return new JsonResponse($this->watchService->retrieveById($id));
    }
}
