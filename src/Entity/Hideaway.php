<?php

namespace App\Entity;

use App\Repository\HideawayRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HideawayRepository::class)
 */
class Hideaway
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $hideaway_code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hideaway_adress;

    /**
     * @ORM\ManyToOne(targetEntity=Country::class, inversedBy="hideaways")
     */
    private $country;

    /**
     * @ORM\ManyToOne(targetEntity=TypeHideaway::class, inversedBy="hideaways")
     */
    private $typeHideaway;

    /**
     * @ORM\ManyToMany(targetEntity=Mission::class, mappedBy="hideaway")
     */
    private $missions;

    public function __construct()
    {
        $this->missions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHideawayCode(): ?string
    {
        return $this->hideaway_code;
    }

    public function setHideawayCode(string $hideaway_code): self
    {
        $this->hideaway_code = $hideaway_code;

        return $this;
    }

    public function getHideawayAdress(): ?string
    {
        return $this->hideaway_adress;
    }

    public function setHideawayAdress(string $hideaway_adress): self
    {
        $this->hideaway_adress = $hideaway_adress;

        return $this;
    }

    public function getCountry(): ?country
    {
        return $this->country;
    }

    public function setCountry(?country $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getTypeHideaway(): ?typeHideaway
    {
        return $this->typeHideaway;
    }

    public function setTypeHideaway(?typeHideaway $typeHideaway): self
    {
        $this->typeHideaway = $typeHideaway;

        return $this;
    }

    /**
     * @return Collection|Mission[]
     */
    public function getMissions(): Collection
    {
        return $this->missions;
    }

    public function addMission(Mission $mission): self
    {
        if (!$this->missions->contains($mission)) {
            $this->missions[] = $mission;
            $mission->addHideaway($this);
        }

        return $this;
    }

    public function removeMission(Mission $mission): self
    {
        if ($this->missions->removeElement($mission)) {
            $mission->removeHideaway($this);
        }

        return $this;
    }
}
