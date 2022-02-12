<?php

namespace App\Entity;

use App\Repository\TypeHideawayRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeHideawayRepository::class)
 */
class TypeHideaway
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $typeHideaway_name;

    /**
     * @ORM\OneToMany(targetEntity=Hideaway::class, mappedBy="typeHideaway")
     */
    private $hideaways;

    public function __construct()
    {
        $this->hideaways = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeHideawayName(): ?string
    {
        return $this->typeHideaway_name;
    }

    public function setTypeHideawayName(string $typeHideaway_name): self
    {
        $this->typeHideaway_name = $typeHideaway_name;

        return $this;
    }

    /**
     * @return Collection|Hideaway[]
     */
    public function getHideaways(): Collection
    {
        return $this->hideaways;
    }

    public function addHideaway(Hideaway $hideaway): self
    {
        if (!$this->hideaways->contains($hideaway)) {
            $this->hideaways[] = $hideaway;
            $hideaway->setTypeHideaway($this);
        }

        return $this;
    }

    public function removeHideaway(Hideaway $hideaway): self
    {
        if ($this->hideaways->removeElement($hideaway)) {
            // set the owning side to null (unless already changed)
            if ($hideaway->getTypeHideaway() === $this) {
                $hideaway->setTypeHideaway(null);
            }
        }

        return $this;
    }
}
