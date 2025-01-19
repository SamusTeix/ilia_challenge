<?php

namespace App\Entity;

use App\Repository\CardRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CardRepository::class)]
class Card
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $tcgId = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'cards')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Supertype $supertype = null;

    /**
     * @var Collection<int, Subtype>
     */
    #[ORM\ManyToMany(targetEntity: Subtype::class, inversedBy: 'cards')]
    private Collection $subtypes;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $level = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $hp = null;

    /**
     * @var Collection<int, Type>
     */
    #[ORM\ManyToMany(targetEntity: Type::class, inversedBy: 'cards')]
    private Collection $types;

    #[ORM\OneToOne(targetEntity: self::class, cascade: ['persist', 'remove'])]
    private ?self $evolvesFrom = null;

    /**
     * @var Collection<int, Ability>
     */
    #[ORM\ManyToMany(targetEntity: Ability::class, inversedBy: 'cards')]
    private Collection $abilities;

    /**
     * @var Collection<int, Attack>
     */
    #[ORM\ManyToMany(targetEntity: Attack::class, inversedBy: 'cards')]
    private Collection $attacks;

    /**
     * @var Collection<int, Weakness>
     */
    #[ORM\ManyToMany(targetEntity: Weakness::class, inversedBy: 'cards')]
    private Collection $weaknesses;

    /**
     * @var Collection<int, Resistance>
     */
    #[ORM\ManyToMany(targetEntity: Resistance::class, inversedBy: 'cards')]
    private Collection $resistances;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private ?array $retreatCost = null;

    #[ORM\ManyToOne(inversedBy: 'cards')]
    private ?Set $cardSet = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $number = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $artist = null;

    #[ORM\ManyToOne(inversedBy: 'cards')]
    private ?Rarity $rarity = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $flavorText = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private ?array $nationalPokedexNumbers = null;

    /**
     * @var Collection<int, Legality>
     */
    #[ORM\ManyToMany(targetEntity: Legality::class, inversedBy: 'cards')]
    private Collection $legalities;

    #[ORM\OneToOne(inversedBy: 'card', cascade: ['persist', 'remove'])]
    private ?Images $images = null;

    public function __construct()
    {
        $this->subtypes = new ArrayCollection();
        $this->types = new ArrayCollection();
        $this->abilities = new ArrayCollection();
        $this->attacks = new ArrayCollection();
        $this->weaknesses = new ArrayCollection();
        $this->resistances = new ArrayCollection();
        $this->legalities = new ArrayCollection();
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

    public function getSupertype(): ?Supertype
    {
        return $this->supertype;
    }

    public function setSupertype(?Supertype $supertype): static
    {
        $this->supertype = $supertype;

        return $this;
    }

    /**
     * @return Collection<int, Subtype>
     */
    public function getSubtypes(): Collection
    {
        return $this->subtypes;
    }

    public function addSubtype(Subtype $subtype): static
    {
        if (!$this->subtypes->contains($subtype)) {
            $this->subtypes->add($subtype);
        }

        return $this;
    }

    public function removeSubtype(Subtype $subtype): static
    {
        $this->subtypes->removeElement($subtype);

        return $this;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(?string $level): static
    {
        $this->level = $level;

        return $this;
    }

    public function getHp(): ?string
    {
        return $this->hp;
    }

    public function setHp(?string $hp): static
    {
        $this->hp = $hp;

        return $this;
    }

    /**
     * @return Collection<int, Type>
     */
    public function getTypes(): Collection
    {
        return $this->types;
    }

    public function addType(Type $type): static
    {
        if (!$this->types->contains($type)) {
            $this->types->add($type);
        }

        return $this;
    }

    public function removeType(Type $type): static
    {
        $this->types->removeElement($type);

        return $this;
    }

    public function getEvolvesFrom(): ?self
    {
        return $this->evolvesFrom;
    }

    public function setEvolvesFrom(?self $evolvesFrom): static
    {
        $this->evolvesFrom = $evolvesFrom;

        return $this;
    }

    /**
     * @return Collection<int, Ability>
     */
    public function getAbilities(): Collection
    {
        return $this->abilities;
    }

    public function addAbility(Ability $ability): static
    {
        if (!$this->abilities->contains($ability)) {
            $this->abilities->add($ability);
        }

        return $this;
    }

    public function removeAbility(Ability $ability): static
    {
        $this->abilities->removeElement($ability);

        return $this;
    }

    /**
     * @return Collection<int, Attack>
     */
    public function getAttacks(): Collection
    {
        return $this->attacks;
    }

    public function addAttack(Attack $attack): static
    {
        if (!$this->attacks->contains($attack)) {
            $this->attacks->add($attack);
        }

        return $this;
    }

    public function removeAttack(Attack $attack): static
    {
        $this->attacks->removeElement($attack);

        return $this;
    }

    /**
     * @return Collection<int, Weakness>
     */
    public function getWeaknesses(): Collection
    {
        return $this->weaknesses;
    }

    public function addWeakness(Weakness $weakness): static
    {
        if (!$this->weaknesses->contains($weakness)) {
            $this->weaknesses->add($weakness);
        }

        return $this;
    }

    public function removeWeakness(Weakness $weakness): static
    {
        $this->weaknesses->removeElement($weakness);

        return $this;
    }

    /**
     * @return Collection<int, Resistance>
     */
    public function getResistances(): Collection
    {
        return $this->resistances;
    }

    public function addResistance(Resistance $resistance): static
    {
        if (!$this->resistances->contains($resistance)) {
            $this->resistances->add($resistance);
        }

        return $this;
    }

    public function removeResistance(Resistance $resistance): static
    {
        $this->resistances->removeElement($resistance);

        return $this;
    }

    public function getRetreatCost(): ?array
    {
        return $this->retreatCost;
    }

    public function setRetreatCost(?array $retreatCost): static
    {
        $this->retreatCost = $retreatCost;

        return $this;
    }

    public function getCardSet(): ?Set
    {
        return $this->cardSet;
    }

    public function setCardSet(?Set $cardSet): static
    {
        $this->cardSet = $cardSet;

        return $this;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(?string $number): static
    {
        $this->number = $number;

        return $this;
    }

    public function getArtist(): ?string
    {
        return $this->artist;
    }

    public function setArtist(?string $artist): static
    {
        $this->artist = $artist;

        return $this;
    }

    public function getRarity(): ?Rarity
    {
        return $this->rarity;
    }

    public function setRarity(?Rarity $rarity): static
    {
        $this->rarity = $rarity;

        return $this;
    }

    public function getFlavorText(): ?string
    {
        return $this->flavorText;
    }

    public function setFlavorText(?string $flavorText): static
    {
        $this->flavorText = $flavorText;

        return $this;
    }

    public function getNationalPokedexNumbers(): ?array
    {
        return $this->nationalPokedexNumbers;
    }

    public function setNationalPokedexNumbers(?array $nationalPokedexNumbers): static
    {
        $this->nationalPokedexNumbers = $nationalPokedexNumbers;

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
            $legality->addCard($this);
        }

        return $this;
    }

    public function removeLegality(Legality $legality): static
    {
        $this->legalities->removeElement($legality);
        if ($legality->getCards()->contains($this)){
            $legality->removeCard($this);
        }

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
}
