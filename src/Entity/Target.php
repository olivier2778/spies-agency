<?php

namespace App\Entity;

use App\Repository\TargetRepository;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;


/**
 * @ORM\Entity(repositoryClass=TargetRepository::class)
 */
class Target
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @ORM\JoinColumn(nullable=false)
     */
    private $target_last_name;

    /**
     * @ORM\Column(type="string", length=50)
     * @ORM\JoinColumn(nullable=false)
     */
    private $target_first_name;

    /**
     * @ORM\Column(type="date")
     * @ORM\JoinColumn(nullable=false)
     */
    private $target_birth_date;

    /**
     * @ORM\Column(type="string", length=50)
     * @ORM\JoinColumn(nullable=false)
     */
    private $target_code_name;
    
    /**
     * @ORM\ManyToMany(targetEntity=Mission::class, mappedBy="target")     
     */
    private $missions;

    /**
     * @ORM\ManyToOne(targetEntity=Nationality::class, inversedBy="targets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $nationality;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTargetLastName(): ?string
    {
        return $this->target_last_name;
    }

    public function setTargetLastName(string $target_last_name): self
    {
        $this->target_last_name = $target_last_name;

        return $this;
    }

    public function getTargetFirstName(): ?string
    {
        return $this->target_first_name;
    }

    public function setTargetFirstName(string $target_first_name): self
    {
        $this->target_first_name = $target_first_name;

        return $this;
    }

    public function getTargetBirthDate(): ?\DateTimeInterface
    {
        return $this->target_birth_date;
    }

    public function setTargetBirthDate(\DateTimeInterface $target_birth_date): self
    {
        $this->target_birth_date = $target_birth_date;

        return $this;
    }

    public function getTargetCodeName(): ?string
    {
        return $this->target_code_name;
    }

    public function setTargetCodeName(string $target_code_name): self
    {
        $this->target_code_name = $target_code_name;

        return $this;
    }

    public function getMission(): ?mission
    {
        return $this->mission;
    }

    public function setMission(?mission $mission): self
    {
        $this->mission = $mission;

        return $this;
    }

    public function getNationality(): ?nationality
    {
        return $this->nationality;
    }

    public function setNationality(?nationality $nationality): self
    {
        $this->nationality = $nationality;

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
            $mission->addTarget($this);
        }

        return $this;
    }

    public function removeMission(Mission $mission): self
    {
        if ($this->missions->removeElement($mission)) {
            $mission->removeTarget($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->target_last_name ;
    }    
    
}
