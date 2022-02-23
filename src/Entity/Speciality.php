<?php

namespace App\Entity;

use App\Repository\SpecialityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SpecialityRepository::class)
 */
class Speciality
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
    private $speciality_name;

    /**
     * @ORM\OneToMany(targetEntity=Mission::class, mappedBy="speciality")
     */
    private $missions;    

    /**
     * @ORM\ManyToMany(targetEntity=Agent::class, mappedBy="agents")
     */
    private $agent;    

    public function __construct()
    {
        $this->missions = new ArrayCollection();
        $this->agent = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSpecialityName(): ?string
    {
        return $this->speciality_name;
    }

    public function setSpecialityName(string $speciality_name): self
    {
        $this->speciality_name = $speciality_name;

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
            $mission->setSpeciality($this);
        }

        return $this;
    }

    public function removeMission(Mission $mission): self
    {
        if ($this->missions->removeElement($mission)) {
            // set the owning side to null (unless already changed)
            if ($mission->getSpeciality() === $this) {
                $mission->setSpeciality(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|agent[]
     */
    public function getAgent(): Collection
    {
        return $this->agent;
    }

    public function addAgent(agent $agent): self
    {
        if (!$this->agent->contains($agent)) {
            $this->agent[] = $agent;
        }

        return $this;
    }

    public function removeAgent(agent $agent): self
    {
        $this->agent->removeElement($agent);

        return $this;
    }    

    public function __toString()
    {
        return $this->speciality_name ;
    }    

}
