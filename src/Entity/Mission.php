<?php

namespace App\Entity;

use App\Repository\MissionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MissionRepository::class)
 */
class Mission
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
    private $mission_title;

    /**
     * @ORM\Column(type="text")
     */
    private $mission_description;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $mission_code_name;

    /**
     * @ORM\Column(type="date")
     */
    private $mission_start_date;

    /**
     * @ORM\Column(type="date")
     */
    private $mission_end_date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMissionTitle(): ?string
    {
        return $this->mission_title;
    }

    public function setMissionTitle(string $mission_title): self
    {
        $this->mission_title = $mission_title;

        return $this;
    }

    public function getMissionDescription(): ?string
    {
        return $this->mission_description;
    }

    public function setMissionDescription(string $mission_description): self
    {
        $this->mission_description = $mission_description;

        return $this;
    }

    public function getMissionCodeName(): ?string
    {
        return $this->mission_code_name;
    }

    public function setMissionCodeName(string $mission_code_name): self
    {
        $this->mission_code_name = $mission_code_name;

        return $this;
    }

    public function getMissionStartDate(): ?\DateTimeInterface
    {
        return $this->mission_start_date;
    }

    public function setMissionStartDate(\DateTimeInterface $mission_start_date): self
    {
        $this->mission_start_date = $mission_start_date;

        return $this;
    }

    public function getMissionEndDate(): ?\DateTimeInterface
    {
        return $this->mission_end_date;
    }

    public function setMissionEndDate(\DateTimeInterface $mission_end_date): self
    {
        $this->mission_end_date = $mission_end_date;

        return $this;
    }
}
