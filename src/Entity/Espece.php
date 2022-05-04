<?php

namespace App\Entity;

use App\Repository\EspeceRepository;
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
}
