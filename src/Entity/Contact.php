<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
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
    private $contact_last_name;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $contact_first_name;

    /**
     * @ORM\Column(type="date")
     */
    private $contact_birth_date;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $contact_code_name;

    /**
     * @ORM\ManyToOne(targetEntity=Nationality::class, inversedBy="contacts")
     */
    private $nationality;

    /**
     * @ORM\ManyToMany(targetEntity=Mission::class)
     * @ORM\JoinTable(name="mission_contact",
     * joinColumns={@ORM\JoinColumn(name="contact_id", referencedColumnName="id")},
     * inverseJoinColumns={@ORM\JoinColumn(name="mission_id", referencedColumnName="id")}
     * )
     */
    private $missions;

    public function __construct()
    {
        $this->missions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContactLastName(): ?string
    {
        return $this->contact_last_name;
    }

    public function setContactLastName(string $contact_last_name): self
    {
        $this->contact_last_name = $contact_last_name;

        return $this;
    }

    public function getContactFirstName(): ?string
    {
        return $this->contact_first_name;
    }

    public function setContactFirstName(string $contact_first_name): self
    {
        $this->contact_first_name = $contact_first_name;

        return $this;
    }

    public function getContactBirthDate(): ?\DateTimeInterface
    {
        return $this->contact_birth_date;
    }

    public function setContactBirthDate(\DateTimeInterface $contact_birth_date): self
    {
        $this->contact_birth_date = $contact_birth_date;

        return $this;
    }

    public function getContactCodeName(): ?string
    {
        return $this->contact_code_name;
    }

    public function setContactCodeName(string $contact_code_name): self
    {
        $this->contact_code_name = $contact_code_name;

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
            $mission->addContact($this);
        }

        return $this;
    }

    public function removeMission(Mission $mission): self
    {
        if ($this->missions->removeElement($mission)) {
            $mission->removeContact($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->contact_last_name ;
    }    
    
}
