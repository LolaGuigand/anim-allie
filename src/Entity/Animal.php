<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalRepository::class)]
class Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $petitNom;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'string', length: 300, nullable: true)]
    private $photo;

    #[ORM\Column(type: 'boolean')]
    private $isFemale;

    #[ORM\Column(type: 'string', length: 255)]
    private $couleur;

    #[ORM\OneToOne(mappedBy: 'animalId', targetEntity: ContratDAdoption::class, cascade: ['persist', 'remove'])]
    private $contratDAdoption;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPetitNom(): ?string
    {
        return $this->petitNom;
    }

    public function setPetitNom(string $petitNom): self
    {
        $this->petitNom = $petitNom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getIsFemale(): ?bool

    {
        return $this->isFemale;
    }

    public function setIsFemale(bool $isFemale): self
    {
        $this->isFemale = $isFemale;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getContratDAdoption(): ?ContratDAdoption
    {
        return $this->contratDAdoption;
    }

    public function setContratDAdoption(ContratDAdoption $contratDAdoption): self
    {
        // set the owning side of the relation if necessary
        if ($contratDAdoption->getAnimalId() !== $this) {
            $contratDAdoption->setAnimalId($this);
        }

        $this->contratDAdoption = $contratDAdoption;

        return $this;
    }
}
