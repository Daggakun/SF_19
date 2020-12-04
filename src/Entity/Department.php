<?php

namespace App\Entity;

use App\Repository\DepartmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Department
 *
 * @ORM\Table(name="department", indexes={@ORM\Index(name="region_id", columns={"region_id"})})
 * @ORM\Entity(repositoryClass=DepartmentRepository::class)
 */
class Department
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=3, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var int|null
     *
     * @ORM\Column(name="inh_num", type="integer", nullable=true)
     */
    private $inhNum;

    /**
     * @var int|null
     *
     * @ORM\Column(name="rea_beds", type="integer", nullable=true)
     */
    private $reaBeds;

    /**
     * @var \Region
     *
     * @ORM\ManyToOne(targetEntity=Region::class, inversedBy="departments")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="region_id", referencedColumnName="id")
     * })
     */
    private $region;


    /**
    *@ORM\OneToMany(targetEntity=Town::class, mappedBy="department")
    */
    private $towns;

    public function __construct() {
        $this->towns = new ArrayCollection();
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getInhNum(): ?int
    {
        return $this->inhNum;
    }

    public function setInhNum(?int $inhNum): self
    {
        $this->inhNum = $inhNum;

        return $this;
    }

    public function getReaBeds(): ?int
    {
        return $this->reaBeds;
    }

    public function setReaBeds(?int $reaBeds): self
    {
        $this->reaBeds = $reaBeds;

        return $this;
    }

    public function getRegion(): ?Region
    {
        return $this->region;
    }

    public function setRegion(?Region $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getRegionId(): ?Region
    {
        return $this->regionId;
    }

    public function setRegionId(?Region $regionId): self
    {
        $this->regionId = $regionId;

        return $this;
    }


    /**
    * @return Collection|Town[]
    */
    public function getTowns(): Collection
    {
        return $this->towns;
    }

    public function addTown(Town $town): self
    {
        if (!$this->towns->contains($town)) {
            $this->towns[] = $town;
            $town->setDepartmentId($this);
        }
        return $this;
    }

    public function removeTown(Town $town): self
    {
        if ($this->towns->removeElement($town)) {
            // set the owning side to null (unless already changed)
             if ($town->getDepartmentId() === $this) {
                $town->setDepartmentId(null);
            }
        }
        return $this;
    }

}
