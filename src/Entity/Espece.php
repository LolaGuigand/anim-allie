<?php

namespace App\Entity;

use App\Repository\EspeceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EspeceRepository::class)]
class Espece
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $NomEspece;

    #[ORM\OneToMany(mappedBy: 'EspeceId', targetEntity: Animal::class)]
    private $animalsList;

    public function __construct()
    {
        $this->animalsList = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEspece(): ?string
    {
        return $this->NomEspece;
    }

    public function setNomEspece(string $NomEspece): self
    {
        $this->NomEspece = $NomEspece;

        return $this;
    }

    /**
     * @return Collection<int, Animal>
     */
    public function getAnimalsList(): Collection
    {
        return $this->animalsList;
    }

    public function addAnimalsList(Animal $animalsList): self
    {
        if (!$this->animalsList->contains($animalsList)) {
            $this->animalsList[] = $animalsList;
            $animalsList->setEspeceId($this);
        }

        return $this;
    }

    public function removeAnimalsList(Animal $animalsList): self
    {
        if ($this->animalsList->removeElement($animalsList)) {
            // set the owning side to null (unless already changed)
            if ($animalsList->getEspeceId() === $this) {
                $animalsList->setEspeceId(null);
            }
        }

        return $this;
    }
}

