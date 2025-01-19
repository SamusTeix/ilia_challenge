<?php

namespace App\Entity;

use App\Repository\SetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SetRepository::class)]
#[ORM\Table(name: '`set`')]
class Set
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $tcgId = null;
 
    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(length: 20)]
    private ?string $series = null;

    #[ORM\Column(nullable: true)]
    private ?int $printedTotal = null;

    #[ORM\Column(nullable: true)]
    private ?int $total = null;

    /**
     * @var Collection<int, Legality>
     */
    #[ORM\ManyToMany(targetEntity: Legality::class, inversedBy: 'sets')]
    private Collection $legalities;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $ptcgoCode = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $releaseDate = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\OneToOne(inversedBy: 'cardSet', cascade: ['persist', 'remove'])]
    private ?Images $images = null;

    /**
     * @var Collection<int, Card>
     */
    #[ORM\OneToMany(targetEntity: Card::class, mappedBy: 'cardSet')]
    private Collection $cards;

    public function __construct()
    {
        $this->legalities = new ArrayCollection();
        $this->cards = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(string $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getTcgId(): ?string
    {
        return $this->tcgId;
    }

    public function setTcgId(string $tcgId): static
    {
        $this->tcgId = $tcgId;

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

    public function getSeries(): ?string
    {
        return $this->series;
    }

    public function setSeries(string $series): static
    {
        $this->series = $series;

        return $this;
    }

    public function getPrintedTotal(): ?int
    {
        return $this->printedTotal;
    }

    public function setPrintedTotal(?int $printedTotal): static
    {
        $this->printedTotal = $printedTotal;

        return $this;
    }

    public function getTotal(): ?int
    {
        return $this->total;
    }

    public function setTotal(?int $total): static
    {
        $this->total = $total;

        return $this;
    }

    /**
     * @return Collection<int, Legality>
     */
    public function getLegalities(): Collection
    {
        return $this->legalities;
    }

    public function addLegality(Legality $legality): static
    {
        if (!$this->legalities->contains($legality)) {
            $this->legalities->add($legality);
            $legality->addSet($this);
        }

        return $this;
    }

    public function removeLegality(Legality $legality): static
    {
        $this->legalities->removeElement($legality);
        if ($legality->getSets()->contains($this)) {
            $legality->removeSet($this);
        }        

        return $this;
    }

    public function getPtcgoCode(): ?string
    {
        return $this->ptcgoCode;
    }

    public function setPtcgoCode(?string $ptcgoCode): static
    {
        $this->ptcgoCode = $ptcgoCode;

        return $this;
    }

    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(\DateTimeInterface $releaseDate): static
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getImages(): ?Images
    {
        return $this->images;
    }

    public function setImages(?Images $images): static
    {
        $this->images = $images;

        return $this;
    }

    /**
     * @return Collection<int, Card>
     */
    public function getCards(): Collection
    {
        return $this->cards;
    }

    public function addCard(Card $card): static
    {
        if (!$this->cards->contains($card)) {
            $this->cards->add($card);
            $card->setCardSet($this);
        }

        return $this;
    }

    public function removeCard(Card $card): static
    {
        if ($this->cards->removeElement($card)) {
            if ($card->getCardSet() === $this) {
                $card->setCardSet(null);
            }
        }

        return $this;
    }
}
