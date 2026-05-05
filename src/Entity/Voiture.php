<?php

namespace App\Entity;

use App\Enum\BoiteVitesse;
use App\Repository\VoitureRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: VoitureRepository::class)]
class Voiture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotBlank()]
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[Assert\NotBlank()]
    #[ORM\Column(length: 2000, nullable: true)]
    private ?string $description = null;

    #[Assert\NotBlank()]
    #[ORM\Column(type: Types::SMALLFLOAT, nullable: true)]
    private ?float $prixMensuel = null;

    #[Assert\NotBlank()]
    #[ORM\Column(type: Types::SMALLFLOAT, nullable: true)]
    private ?float $prixJournalier = null;

    #[Assert\NotBlank()]
    #[Assert\Type(type: Types::INTEGER)]
    #[Assert\Range(min:2,max:8)]
    #[ORM\Column(nullable: true)]
    private ?int $nombrePlace = null;

    #[Assert\NotBlank()]
    #[ORM\Column(nullable: true,enumType: BoiteVitesse::class)]
    private ?BoiteVitesse $boiteVitesse = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrixMensuel(): ?float
    {
        return $this->prixMensuel;
    }

    public function setPrixMensuel(?float $prixMensuel): static
    {
        $this->prixMensuel = $prixMensuel;

        return $this;
    }

    public function getPrixJournalier(): ?float
    {
        return $this->prixJournalier;
    }

    public function setPrixJournalier(?float $prixJournalier): static
    {
        $this->prixJournalier = $prixJournalier;

        return $this;
    }

    public function getNombrePlace(): ?int
    {
        return $this->nombrePlace;
    }

    public function setNombrePlace(?int $nombrePlace): static
    {
        $this->nombrePlace = $nombrePlace;

        return $this;
    }

    public function getBoiteVitesse(): ?BoiteVitesse
    {
        return $this->boiteVitesse;
    }

    public function setBoiteVitesse(?BoiteVitesse $boiteVitesse): static
    {
        $this->boiteVitesse = $boiteVitesse;

        return $this;
    }

}
