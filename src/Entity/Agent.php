<?php

namespace App\Entity;

use App\Repository\AgentRepository;
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
}
