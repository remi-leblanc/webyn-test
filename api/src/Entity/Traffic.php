<?php

namespace App\Entity;

use App\Repository\TrafficRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TrafficRepository::class)]
class Traffic
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $pageUrl = null;

    #[ORM\Column]
    private ?int $trafficCount = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPageUrl(): ?string
    {
        return $this->pageUrl;
    }

    public function setPageUrl(string $pageUrl): static
    {
        $this->pageUrl = $pageUrl;

        return $this;
    }

    public function getTrafficCount(): ?int
    {
        return $this->trafficCount;
    }

    public function setTrafficCount(int $trafficCount): static
    {
        $this->trafficCount = $trafficCount;

        return $this;
    }
}
