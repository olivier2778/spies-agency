<?php

namespace App\Entity;

use App\Repository\TypeMissionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeMissionRepository::class)
 */
class TypeMission
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
    private $typeMission_name;

    /**
     * @ORM\OneToMany(targetEntity=Mission::class, mappedBy="typeMission")
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

    public function getTypeMissionName(): ?string
    {
        return $this->typeMission_name;
    }

    public function setTypeMissionName(string $typeMission_name): self
    {
        $this->typeMission_name = $typeMission_name;

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
            $mission->setTypeMission($this);
        }

        return $this;
    }

    public function removeMission(Mission $mission): self
    {
        if ($this->missions->removeElement($mission)) {
            // set the owning side to null (unless already changed)
            if ($mission->getTypeMission() === $this) {
                $mission->setTypeMission(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->typeMission_name ;
    }




}
