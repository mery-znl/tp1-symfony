<?php

namespace App\Entity;

use App\Repository\SeasonsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SeasonsRepository::class)]
class Seasons
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $serie_id = null;

    #[ORM\Column(length: 255)]
    private ?string $season_number = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSerieId(): ?int
    {
        return $this->serie_id;
    }

    public function setSerieId(int $serie_id): static
    {
        $this->serie_id = $serie_id;

        return $this;
    }

    public function getSeasonNumber(): ?string
    {
        return $this->season_number;
    }

    public function setSeasonNumber(string $season_number): static
    {
        $this->season_number = $season_number;

        return $this;
    }
}
