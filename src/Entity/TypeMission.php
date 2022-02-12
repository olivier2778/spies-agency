<?php

namespace App\Entity;

use App\Repository\TypeMissionRepository;
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
}
