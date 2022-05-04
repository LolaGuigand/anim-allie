<?php

namespace App\Entity;

use App\Repository\ContratDAdoptionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContratDAdoptionRepository::class)]
class ContratDAdoption
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\OneToOne(inversedBy: 'contratDAdoption', targetEntity: Animal::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $animalId;

    #[ORM\Column(type: 'string', length: 255)]
    private $nomAdoptant;

    #[ORM\Column(type: 'string', length: 255)]
    private $prenomAdoptant;

    #[ORM\Column(type: 'string', length: 500)]
    private $adresseAdoptant;

    #[ORM\Column(type: 'string', length: 13)]
    private $telephoneAdoptant;

    #[ORM\Column(type: 'string', length: 255)]
    private $emailAdoptant;

    #[ORM\Column(type: 'date')]
    private $dateEmission;

    #[ORM\Column(type: 'date', nullable: true)]
    private $dateSignature;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnimalId(): ?Animal
    {
        return $this->animalId;
    }

    public function setAnimalId(Animal $animalId): self
    {
        $this->animalId = $animalId;

        return $this;
    }

    public function getNomAdoptant(): ?string
    {
        return $this->nomAdoptant;
    }

    public function setNomAdoptant(string $nomAdoptant): self
    {
        $this->nomAdoptant = $nomAdoptant;

        return $this;
    }

    public function getPrenomAdoptant(): ?string
    {
        return $this->prenomAdoptant;
    }

    public function setPrenomAdoptant(string $prenomAdoptant): self
    {
        $this->prenomAdoptant = $prenomAdoptant;

        return $this;
    }

    public function getAdresseAdoptant(): ?string
    {
        return $this->adresseAdoptant;
    }

    public function setAdresseAdoptant(string $adresseAdoptant): self
    {
        $this->adresseAdoptant = $adresseAdoptant;

        return $this;
    }

    public function getTelephoneAdoptant(): ?string
    {
        return $this->telephoneAdoptant;
    }

    public function setTelephoneAdoptant(string $telephoneAdoptant): self
    {
        $this->telephoneAdoptant = $telephoneAdoptant;

        return $this;
    }

    public function getEmailAdoptant(): ?string
    {
        return $this->emailAdoptant;
    }

    public function setEmailAdoptant(string $emailAdoptant): self
    {
        $this->emailAdoptant = $emailAdoptant;

        return $this;
    }

    public function getDateEmission(): ?\DateTimeInterface
    {
        return $this->dateEmission;
    }

    public function setDateEmission(\DateTimeInterface $dateEmission): self
    {
        $this->dateEmission = $dateEmission;

        return $this;
    }

    public function getDateSignature(): ?\DateTimeInterface
    {
        return $this->dateSignature;
    }

    public function setDateSignature(?\DateTimeInterface $dateSignature): self
    {
        $this->dateSignature = $dateSignature;

        return $this;
    }
}
