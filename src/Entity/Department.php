<?php

namespace App\Entity;

use App\Repository\DepartmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DepartmentRepository::class)
 */
class Department
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Region::class, inversedBy="departments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $regionId;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $inh_num;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $rea_beds;

    /**
     * @ORM\OneToMany(targetEntity=Town::class, mappedBy="departmentId")
     */
    private $towns;

    public function __construct()
    {
        $this->towns = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
        return $this->inh_num;
    }

    public function setInhNum(int $inh_num): self
    {
        $this->inh_num = $inh_num;

        return $this;
    }

    public function getReaBeds(): ?int
    {
        return $this->rea_beds;
    }

    public function setReaBeds(?int $rea_beds): self
    {
        $this->rea_beds = $rea_beds;

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
