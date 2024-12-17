<?php

namespace App\Entity;

use App\Repository\SeasonRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SeasonRepository::class)]
class Season
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $season_number = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?serie $serie_id = null;
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