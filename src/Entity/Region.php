<?php

namespace App\Entity;

use App\Repository\RegionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RegionRepository::class)
 */
class Region
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $inh_num;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $rea_beds;

    /**
     * @ORM\OneToMany(targetEntity=Department::class, mappedBy="regionId")
     */
    private $departments;

    public function __construct()
    {
        $this->departments = new ArrayCollection();
    }

    public function getId(): ?int
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
        return $this->inh_num;
    }

    public function setInhNum(?int $inh_num): self
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
     * @return Collection|Department[]
     */
    public function getDepartments(): Collection
    {
        return $this->departments;
    }

    public function addDepartment(Department $department): self
    {
        if (!$this->departments->contains($department)) {
            $this->departments[] = $department;
            $department->setRegionId($this);
        }

        return $this;
    }

    public function removeDepartment(Department $department): self
    {
        if ($this->departments->removeElement($department)) {
            // set the owning side to null (unless already changed)
            if ($department->getRegionId() === $this) {
                $department->setRegionId(null);
            }
        }

        return $this;
    }
}
