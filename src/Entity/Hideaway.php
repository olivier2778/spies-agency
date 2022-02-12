<?php

namespace App\Entity;

use App\Repository\HideawayRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HideawayRepository::class)
 */
class Hideaway
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
    private $hideaway_code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hideaway_adress;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHideawayCode(): ?string
    {
        return $this->hideaway_code;
    }

    public function setHideawayCode(string $hideaway_code): self
    {
        $this->hideaway_code = $hideaway_code;

        return $this;
    }

    public function getHideawayAdress(): ?string
    {
        return $this->hideaway_adress;
    }

    public function setHideawayAdress(string $hideaway_adress): self
    {
        $this->hideaway_adress = $hideaway_adress;

        return $this;
    }
}
