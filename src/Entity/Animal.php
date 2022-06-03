<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\Column(type: 'boolean', nullable: false)]
    private $isFemale;

    #[ORM\OneToOne(mappedBy: 'animalId', targetEntity: ContratDAdoption::class, cascade: ['persist', 'remove'])]
    private $contratDAdoption;

    #[ORM\ManyToOne(targetEntity: Espece::class, inversedBy: 'animalsList')]
    #[ORM\JoinColumn(nullable: false)]
    private $especeId;

    #[ORM\ManyToMany(targetEntity: Couleur::class, inversedBy: 'animals')]
    private $couleur;

    public function __construct()
    {
        $this->couleur = new ArrayCollection();
    }

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

    public function getPhotoUrl(): ?string
    {
        if (!$this->photo) {
            return null;
        }
        if (strpos($this->photo, '/') !== false) {
            return $this->photo;
        }
        return sprintf('/uploads/images/%s', $this->photo);
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

    public function getEspeceId(): ?Espece
    {
        return $this->especeId;
    }

    public function setEspeceId(?Espece $especeId): self
    {
        $this->especeId = $especeId;

        return $this;
    }

    /**
     * @return Collection<int, Couleur>
     */
    public function getCouleur(): Collection
    {
        return $this->couleur;
    }

    public function addCouleur(Couleur $couleur): self
    {
        if (!$this->couleur->contains($couleur)) {
            $this->couleur[] = $couleur;
        }

        return $this;
    }

    public function removeCouleur(Couleur $couleur): self
    {
        $this->couleur->removeElement($couleur);

        return $this;
    }

    public function __toString(){
        return $this->petitNom ." (référence #". $this->id .")"; 
      }
}
