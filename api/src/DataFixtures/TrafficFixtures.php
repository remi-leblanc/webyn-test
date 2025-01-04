<?php

namespace App\DataFixtures;

use App\Entity\Traffic;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TrafficFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
		$dummyData = [
            ['pageUrl' => '/home', 'trafficCount' => 125],
            ['pageUrl' => '/about', 'trafficCount' => 80],
            ['pageUrl' => '/products', 'trafficCount' => 300],
            ['pageUrl' => '/contact', 'trafficCount' => 45],
            ['pageUrl' => '/blog', 'trafficCount' => 95],
        ];

        foreach ($dummyData as $data) {
            $traffic = new Traffic();
            $traffic->setPageUrl($data['pageUrl']);
            $traffic->setTrafficCount($data['trafficCount']);
            $manager->persist($traffic);
        }

        $manager->flush();
    }
}
