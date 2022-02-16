<?php

namespace App\Entity;

use App\Repository\TargetRepository;
use Doctrine\ORM\Mapping as ORM;

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
     */
    private $target_last_name;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $target_first_name;

    /**
     * @ORM\Column(type="date")
     */
    private $target_birth_date;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $target_code_name;

    /**
     * @ORM\ManyToOne(targetEntity=Mission::class, inversedBy="targets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $mission;

    /**
     * @ORM\ManyToOne(targetEntity=Nationality::class, inversedBy="targets")
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
}
