<?php

namespace App\Entity;

use App\Repository\TypeHideawayRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeHideawayRepository::class)
 */
class TypeHideaway
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
    private $typeHideaway_name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeHideawayName(): ?string
    {
        return $this->typeHideaway_name;
    }

    public function setTypeHideawayName(string $typeHideaway_name): self
    {
        $this->typeHideaway_name = $typeHideaway_name;

        return $this;
    }
}
