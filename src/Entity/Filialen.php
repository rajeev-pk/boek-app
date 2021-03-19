<?php

namespace App\Entity;

use App\Repository\FilialenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FilialenRepository::class)
 */
class Filialen
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Naam;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Adres;

    /**
     * @ORM\ManyToMany(targetEntity=Boeken::class, mappedBy="fillaal")
     */
    private $boekens;

    public function __construct()
    {
        $this->boekens = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->Naam;
    }

    public function setNaam(string $Naam): self
    {
        $this->Naam = $Naam;

        return $this;
    }

    public function getAdres(): ?string
    {
        return $this->Adres;
    }

    public function setAdres(string $Adres): self
    {
        $this->Adres = $Adres;

        return $this;
    }

    /**
     * @return Collection|Boeken[]
     */
    public function getBoekens(): Collection
    {
        return $this->boekens;
    }

    public function addBoeken(Boeken $boeken): self
    {
        if (!$this->boekens->contains($boeken)) {
            $this->boekens[] = $boeken;
            $boeken->addFillaal($this);
        }

        return $this;
    }

    public function removeBoeken(Boeken $boeken): self
    {
        if ($this->boekens->removeElement($boeken)) {
            $boeken->removeFillaal($this);
        }

        return $this;
    }

    public function __toString() {
    	return $this->getNaam() . "";
    }
}
