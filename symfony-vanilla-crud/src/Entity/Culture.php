<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
class Culture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 120)]
    #[Assert\NotBlank(message: 'Le nom est obligatoire.')]
    #[Assert\Length(max: 120)]
    private ?string $nom = null;

    #[ORM\Column(length: 80)]
    #[Assert\NotBlank(message: 'La saison est obligatoire.')]
    #[Assert\Length(max: 80)]
    private ?string $saison = null;

    #[ORM\Column]
    #[Assert\NotNull(message: 'Le rendement estimé est obligatoire.')]
    #[Assert\PositiveOrZero(message: 'Le rendement ne peut pas être négatif.')]
    private ?float $rendementEstime = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getSaison(): ?string
    {
        return $this->saison;
    }

    public function setSaison(string $saison): self
    {
        $this->saison = $saison;

        return $this;
    }

    public function getRendementEstime(): ?float
    {
        return $this->rendementEstime;
    }

    public function setRendementEstime(float $rendementEstime): self
    {
        $this->rendementEstime = $rendementEstime;

        return $this;
    }
}
