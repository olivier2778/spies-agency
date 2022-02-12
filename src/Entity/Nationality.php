<?php

namespace App\Entity;

use App\Repository\NationalityRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NationalityRepository::class)
 */
class Nationality
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
    private $nationality_name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNationalityName(): ?string
    {
        return $this->nationality_name;
    }

    public function setNationalityName(string $nationality_name): self
    {
        $this->nationality_name = $nationality_name;

        return $this;
    }
}
