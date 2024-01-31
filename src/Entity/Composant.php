<?php

namespace App\Entity;

use App\Repository\ComposantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ComposantRepository::class)]
class Composant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $libelle = null;

    #[ORM\ManyToMany(targetEntity: Baguette::class, inversedBy: 'composants')]
    private Collection $baguettes;

    public function __construct()
    {
        $this->baguettes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection<int, Baguette>
     */
    public function getBaguettes(): Collection
    {
        return $this->baguettes;
    }

    public function addBaguette(Baguette $baguette): static
    {
        if (!$this->baguettes->contains($baguette)) {
            $this->baguettes->add($baguette);
        }

        return $this;
    }

    public function removeBaguette(Baguette $baguette): static
    {
        $this->baguettes->removeElement($baguette);

        return $this;
    }
}
