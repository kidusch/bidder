<?php

namespace App\Entity;

use App\Repository\TenderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TenderRepository::class)]
class Tender
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $deadline = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'tender', targetEntity: Bid::class)]
    private Collection $bids;

    #[ORM\ManyToOne(inversedBy: 'tenders')]
    private ?Category $category = null;

    #[ORM\ManyToOne(inversedBy: 'tenders')]
    private ?Tendertype $tendertype = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\Column(nullable: true)]
    private ?float $startprice = null;

    #[ORM\Column(nullable: true)]
    private ?float $currentprice = null;

    public function __construct()
    {
        $this->bids = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDeadline(): ?\DateTimeInterface
    {
        return $this->deadline;
    }

    public function setDeadline(\DateTimeInterface $deadline): self
    {
        $this->deadline = $deadline;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Bid>
     */
    public function getBids(): Collection
    {
        return $this->bids;
    }

    public function addBid(Bid $bid): self
    {
        if (!$this->bids->contains($bid)) {
            $this->bids->add($bid);
            $bid->setTender($this);
        }

        return $this;
    }

    public function removeBid(Bid $bid): self
    {
        if ($this->bids->removeElement($bid)) {
            // set the owning side to null (unless already changed)
            if ($bid->getTender() === $this) {
                $bid->setTender(null);
            }
        }

        return $this;
    }

    public function __toString() {
        $value = $this->id . ' - ' . $this->title;
        return $value;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getTendertype(): ?Tendertype
    {
        return $this->tendertype;
    }

    public function setTendertype(?Tendertype $tendertype): self
    {
        $this->tendertype = $tendertype;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getStartprice(): ?float
    {
        return $this->startprice;
    }

    public function setStartprice(?float $startprice): self
    {
        $this->startprice = $startprice;

        return $this;
    }

    public function getCurrentprice(): ?float
    {
        return $this->currentprice;
    }

    public function setCurrentprice(?float $currentprice): self
    {
        $this->currentprice = $currentprice;

        return $this;
    }
}
