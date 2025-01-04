<?php

namespace App\Tests\Controller;

use App\Controller\TrafficController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\HttpFoundation\JsonResponse;

class TrafficControllerTest extends KernelTestCase
{
	private EntityManagerInterface $entityManager;
	private TrafficController $controller;

	protected function setUp(): void
	{
		self::bootKernel();
		$this->entityManager = static::$kernel->getContainer()->get('doctrine')->getManager();
		$this->controller = new TrafficController($this->entityManager);
	}

	public function testGetTraffic(): void
	{
		// Act
		$response = $this->controller->getTraffic();

		// Assert
		$this->assertInstanceOf(JsonResponse::class, $response);
		$content = json_decode($response->getContent(), true);
		$this->assertCount(5, $content);
	}
}
