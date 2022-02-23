<?php

namespace App\Entity;
use App\Repository\MissionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


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
     * @Assert\NotNull(message="Le titre est obligatoire")
     * @Assert\Length(
     *     min=2,
     *     max=100,
     *     minMessage= "2 caractères minimum",
     *     maxMessage ="100 caractères maximum"
     * )
     */
    private $mission_title;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotNull(message="Le descriptif est obligatoire")
     * @Assert\Length(
     *     min=5,        
     *     minMessage= "5 caractères minimum",         
     * )
     */
    private $mission_description;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotNull(message="Le code est obligatoire")
     * @Assert\Length(
     *     min=2,
     *     max=50,
     *     minMessage= "2 caractères minimum",
     *     maxMessage ="50 caractères maximum"
     * )
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

    /**
     * @ORM\ManyToOne(targetEntity=TypeMission::class, inversedBy="missions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeMission;

    /**
     * @ORM\ManyToOne(targetEntity=Status::class, inversedBy="missions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity=Speciality::class, inversedBy="missions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $speciality;

    /**
     * @ORM\ManyToOne(targetEntity=Country::class, inversedBy="missions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $country;
   
     /**
     * @ORM\ManyToMany(targetEntity=Target::class, inversedBy="missions")
     */
    private $target;

    /**
     * @ORM\ManyToMany(targetEntity=Agent::class, inversedBy="missions")
     */
    private $agent;

    /**
     * @ORM\ManyToMany(targetEntity=Contact::class, inversedBy="missions")
     */
    private $contact;      

   /**
     * @ORM\ManyToMany(targetEntity=Hideaway::class, inversedBy="missions")
     */
    private $hideaway;
    

    public function __construct()
    {
        $this->target = new ArrayCollection();
        $this->agent = new ArrayCollection();
        $this->contact = new ArrayCollection();
        $this->hideaway = new ArrayCollection();
    }

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

    public function getTypeMission(): ?typeMission
    {
        return $this->typeMission;
    }

    public function setTypeMission(?typeMission $typeMission): self
    {
        $this->typeMission = $typeMission;

        return $this;
    }

    public function getStatus(): ?status
    {
        return $this->status;
    }

    public function setStatus(?status $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getSpeciality(): ?speciality
    {
        return $this->speciality;
    }

    public function setSpeciality(?speciality $speciality): self
    {
        $this->speciality = $speciality;

        return $this;
    }

    public function getCountry(): ?country
    {
        return $this->country;
    }

    public function setCountry(?country $country): self
    {
        $this->country = $country;

        return $this;
    }
  

    /**
     * @return Collection|target[]
     */
    public function getTarget(): Collection
    {
        return $this->target;
    }

    public function addTarget(target $target): self
    {
        if (!$this->agent->contains($target)) {
            $this->target[] = $target;            
        }

        return $this;
    } 


    public function removeTarget(target $target): self
    {
        $this->targets->removeElement($target);     

        return $this;
    }

    /**
     * @return Collection|agent[]
     */    
    public function getAgent(): Collection
    {
        return $this->agent;
    }

    public function addAgent(agent $agent): self
    {
        if (!$this->agent->contains($agent)) {
            $this->agent[] = $agent;
        }

        return $this;
    }

    public function removeAgent(agent $agent): self
    {
        $this->agent->removeElement($agent);

        return $this;
    }

    /**
     * @return Collection|contact[]
     */
    public function getContact(): Collection
    {
        return $this->contact;
    }

    public function addContact(contact $contact): self
    {
        if (!$this->contact->contains($contact)) {
            $this->contact[] = $contact;
        }

        return $this;
    }

    public function removeContact(contact $contact): self
    {
        $this->contact->removeElement($contact);

        return $this;
    }

    /**
     * @return Collection|hideaway[]
     */
    public function getHideaway(): Collection
    {
        return $this->hideaway;
    }

    public function addHideaway(hideaway $hideaway): self
    {
        if (!$this->hideaway->contains($hideaway)) {
            $this->hideaway[] = $hideaway;
        }

        return $this;
    }

    public function removeHideaway(hideaway $hideaway): self
    {
        $this->hideaway->removeElement($hideaway);

        return $this;
    }

    public function __toString()
    {
        return $this->mission_title ;
    }    
    

    
    
}
