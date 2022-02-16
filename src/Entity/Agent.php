<?php

namespace App\Entity;

use App\Repository\AgentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AgentRepository::class)
 */
class Agent
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
    private $agent_last_name;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $agent_first_name;

    /**
     * @ORM\Column(type="date")
     */
    private $agent_birth_date;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $agent_identification_code;

    /**
     * @ORM\ManyToOne(targetEntity=Nationality::class, inversedBy="agents")
     */
    private $nationality;

    /**
     * @ORM\ManyToMany(targetEntity=Speciality::class, mappedBy="agent")
     */
    private $specialities;

    /**
     * @ORM\ManyToMany(targetEntity=Mission::class, mappedBy="agent")
     */
    private $missions;

    public function __construct()
    {
        $this->specialities = new ArrayCollection();
        $this->missions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAgentLastName(): ?string
    {
        return $this->agent_last_name;
    }

    public function setAgentLastName(string $agent_last_name): self
    {
        $this->agent_last_name = $agent_last_name;

        return $this;
    }

    public function getAgentFirstName(): ?string
    {
        return $this->agent_first_name;
    }

    public function setAgentFirstName(string $agent_first_name): self
    {
        $this->agent_first_name = $agent_first_name;

        return $this;
    }

    public function getAgentBirthDate(): ?\DateTimeInterface
    {
        return $this->agent_birth_date;
    }

    public function setAgentBirthDate(\DateTimeInterface $agent_birth_date): self
    {
        $this->agent_birth_date = $agent_birth_date;

        return $this;
    }

    public function getAgentIdentificationCode(): ?string
    {
        return $this->agent_identification_code;
    }

    public function setAgentIdentificationCode(string $agent_identification_code): self
    {
        $this->agent_identification_code = $agent_identification_code;

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
     * @return Collection|Speciality[]
     */
    public function getSpecialities(): Collection
    {
        return $this->specialities;
    }

    public function addSpeciality(Speciality $speciality): self
    {
        if (!$this->specialities->contains($speciality)) {
            $this->specialities[] = $speciality;
            $speciality->addAgent($this);
        }

        return $this;
    }

    public function removeSpeciality(Speciality $speciality): self
    {
        if ($this->specialities->removeElement($speciality)) {
            $speciality->removeAgent($this);
        }

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
            $mission->addAgent($this);
        }

        return $this;
    }

    public function removeMission(Mission $mission): self
    {
        if ($this->missions->removeElement($mission)) {
            $mission->removeAgent($this);
        }

        return $this;
    }

    
}
