<?php
// src/Controller/TrafficController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Traffic;

class TrafficController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

	#[Route('/api/traffic', name: 'get_traffic', methods: ['GET'])]
    public function getTraffic(): JsonResponse
    {
        // Fetch traffic data from the database
        $repository = $this->entityManager->getRepository(Traffic::class);
        $trafficData = $repository->findAll();

        $response = array_map(function (Traffic $traffic) {
            return [
                'page_id' => $traffic->getId(),
                'page_url' => $traffic->getPageUrl(),
                'traffic' => $traffic->getTrafficCount()
            ];
        }, $trafficData);

        return new JsonResponse($response);
    }
}
