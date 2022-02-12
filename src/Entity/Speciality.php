<?php

namespace App\Entity;

use App\Repository\SpecialityRepository;
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
}
