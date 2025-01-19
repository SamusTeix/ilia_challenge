<?php

namespace App\Entity;

use App\Repository\ImagesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImagesRepository::class)]
class Images
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $symbol = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $logo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $small = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $large = null;

    #[ORM\OneToOne(mappedBy: 'images', cascade: ['persist', 'remove'])]
    private ?Set $cardSet = null;

    #[ORM\OneToOne(mappedBy: 'images', cascade: ['persist', 'remove'])]
    private ?Card $card = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getSymbol(): ?string
    {
        return $this->symbol;
    }

    public function setSymbol(?string $symbol): static
    {
        $this->symbol = $symbol;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): static
    {
        $this->logo = $logo;

        return $this;
    }

    public function getSmall(): ?string
    {
        return $this->small;
    }

    public function setSmall(?string $small): static
    {
        $this->small = $small;

        return $this;
    }

    public function getLarge(): ?string
    {
        return $this->large;
    }

    public function setLarge(?string $large): static
    {
        $this->large = $large;

        return $this;
    }

    public function getCardSet(): ?Set
    {
        return $this->cardSet;
    }

    public function setCardSet(?Set $cardSet): static
    {
        // unset the owning side of the relation if necessary
        if ($cardSet === null && $this->cardSet !== null) {
            $this->cardSet->setImages(null);
        }

        // set the owning side of the relation if necessary
        if ($cardSet !== null && $cardSet->getImages() !== $this) {
            $cardSet->setImages($this);
        }

        $this->cardSet = $cardSet;

        return $this;
    }

    public function getCard(): ?Card
    {
        return $this->card;
    }

    public function setCard(?Card $card): static
    {
        // unset the owning side of the relation if necessary
        if ($card === null && $this->card !== null) {
            $this->card->setImages(null);
        }

        // set the owning side of the relation if necessary
        if ($card !== null && $card->getImages() !== $this) {
            $card->setImages($this);
        }

        $this->card = $card;

        return $this;
    }
}
