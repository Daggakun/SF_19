<?php

namespace App\Entity;

use App\Repository\RegionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Region
 *
 * @ORM\Table(name="region")
 * @ORM\Entity(repositoryClass=RegionRepository::class)
 */
class Region
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var int|null
     *
     * @ORM\Column(name="inh_num", type="bigint", nullable=true)
     */
    private $inhNum;

    /**
     * @var int|null
     *
     * @ORM\Column(name="rea_beds", type="integer", nullable=true)
     */
    private $reaBeds;

    /**
    * @ORM\OneToMany(targetEntity=Department::class, mappedBy="region")
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

    public function getInhNum(): ?string
    {
        return $this->inhNum;
    }

    public function setInhNum(?string $inhNum): self
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
