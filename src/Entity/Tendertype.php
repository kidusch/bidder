<?php

namespace App\Entity;

use App\Repository\TendertypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TendertypeRepository::class)]
class Tendertype
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'tendertype', targetEntity: Tender::class)]
    private Collection $tenders;

    public function __construct()
    {
        $this->tenders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Tender>
     */
    public function getTenders(): Collection
    {
        return $this->tenders;
    }

    public function addTender(Tender $tender): self
    {
        if (!$this->tenders->contains($tender)) {
            $this->tenders->add($tender);
            $tender->setTendertype($this);
        }

        return $this;
    }

    public function removeTender(Tender $tender): self
    {
        if ($this->tenders->removeElement($tender)) {
            // set the owning side to null (unless already changed)
            if ($tender->getTendertype() === $this) {
                $tender->setTendertype(null);
            }
        }

        return $this;
    }

    public function __toString() {
        return $this->name;
    }
}
