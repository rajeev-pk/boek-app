<?php

namespace App\Entity;

use App\Repository\BoekenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BoekenRepository::class)
 */
class Boeken
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $SIDN_nummer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="integer")
     */
    private $voorraad;

    /**
     * @ORM\ManyToMany(targetEntity=Filialen::class, inversedBy="boekens")
     */
    private $fillaal;

    public function __construct()
    {
        $this->fillaal = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSIDNNummer(): ?int
    {
        return $this->SIDN_nummer;
    }

    public function setSIDNNummer(int $SIDN_nummer): self
    {
        $this->SIDN_nummer = $SIDN_nummer;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getVoorraad(): ?int
    {
        return $this->voorraad;
    }

    public function setVoorraad(int $voorraad): self
    {
        $this->voorraad = $voorraad;

        return $this;
    }

    /**
     * @return Collection|Filialen[]
     */
    public function getFillaal(): Collection
    {
        return $this->fillaal;
    }

    public function addFillaal(Filialen $fillaal): self
    {
        if (!$this->fillaal->contains($fillaal)) {
            $this->fillaal[] = $fillaal;
        }

        return $this;
    }

    public function removeFillaal(Filialen $fillaal): self
    {
        $this->fillaal->removeElement($fillaal);

        return $this;
    }

    public function __toString()
    {
    	return $this->getId() . ": " .$this->getTitle() . "";
    }
}
