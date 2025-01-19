<?php

namespace App\Entity;

use App\Repository\SupertypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SupertypeRepository::class)]
class Supertype
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    /**
     * @var Collection<int, Card>
     */
    #[ORM\OneToMany(targetEntity: Card::class, mappedBy: 'supertype')]
    private Collection $cards;

    public function __construct()
    {
        $this->cards = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Card>
     */
    public function getCards(): Collection
    {
        return $this->cards;
    }

    public function addCards(Card $cards): static
    {
        if (!$this->cards->contains($cards)) {
            $this->cards->add($cards);
            $cards->setSupertype($this);
        }

        return $this;
    }

    public function removeCards(Card $cards): static
    {
        if ($this->cards->removeElement($cards)) {
            // set the owning side to null (unless already changed)
            if ($cards->getSupertype() === $this) {
                $cards->setSupertype(null);
            }
        }

        return $this;
    }
}
