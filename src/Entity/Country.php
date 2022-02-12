<?php

namespace App\Entity;

use App\Repository\CountryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CountryRepository::class)
 */
class Country
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
    private $country_name;

    /**
     * @ORM\OneToMany(targetEntity=Mission::class, mappedBy="country")
     */
    private $missions;

    /**
     * @ORM\OneToMany(targetEntity=Hideaway::class, mappedBy="country")
     */
    private $hideaways;

    public function __construct()
    {
        $this->missions = new ArrayCollection();
        $this->hideaways = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCountryName(): ?string
    {
        return $this->country_name;
    }

    public function setCountryName(string $country_name): self
    {
        $this->country_name = $country_name;

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
            $mission->setCountry($this);
        }

        return $this;
    }

    public function removeMission(Mission $mission): self
    {
        if ($this->missions->removeElement($mission)) {
            // set the owning side to null (unless already changed)
            if ($mission->getCountry() === $this) {
                $mission->setCountry(null);
            }
        }

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
            $hideaway->setCountry($this);
        }

        return $this;
    }

    public function removeHideaway(Hideaway $hideaway): self
    {
        if ($this->hideaways->removeElement($hideaway)) {
            // set the owning side to null (unless already changed)
            if ($hideaway->getCountry() === $this) {
                $hideaway->setCountry(null);
            }
        }

        return $this;
    }
}
