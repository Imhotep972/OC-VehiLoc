<?php

namespace App\Entity;

use App\Enum\BoiteVitesse;
use App\Repository\VoitureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VoitureRepository::class)]
class Voiture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    private ?int $prixMensuel = null;

    #[ORM\Column(nullable: true)]
    private ?int $prixJournalier = null;

    #[ORM\Column(nullable: true)]
    private ?int $nombrePlace = null;

    #[ORM\Column(nullable: true, enumType: BoiteVitesse::class)]
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

    public function getPrixMensuel(): ?int
    {
        return $this->prixMensuel;
    }

    public function setPrixMensuel(?int $prixMensuel): static
    {
        $this->prixMensuel = $prixMensuel;

        return $this;
    }

    public function getPrixJournalier(): ?int
    {
        return $this->prixJournalier;
    }

    public function setPrixJournalier(?int $prixJournalier): static
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
