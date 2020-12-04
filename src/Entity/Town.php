<?php

namespace App\Entity;

use App\Repository\TownRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TownRepository::class)
 */
class Town
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
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=Department::class, inversedBy="towns")
     * @ORM\JoinColumn(nullable=false)
     */
    private $departmentId;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $lat;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $lng;

    /**
     * @ORM\Column(type="integer")
     */
    private $population;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $reaBeds;

    /**
     * @ORM\OneToMany(targetEntity=Test::class, mappedBy="townId")
     */
    private $tests;

    /**
     * @ORM\OneToMany(targetEntity=Record::class, mappedBy="townId")
     */
    private $records;

    public function __construct()
    {
        $this->tests = new ArrayCollection();
        $this->records = new ArrayCollection();
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

    public function getDepartmentId(): ?Department
    {
        return $this->departmentId;
    }

    public function setDepartmentId(?Department $departmentId): self
    {
        $this->departmentId = $departmentId;

        return $this;
    }

    public function getLat(): ?string
    {
        return $this->lat;
    }

    public function setLat(string $lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLng(): ?string
    {
        return $this->lng;
    }

    public function setLng(string $lng): self
    {
        $this->lng = $lng;

        return $this;
    }

    public function getPopulation(): ?int
    {
        return $this->population;
    }

    public function setPopulation(int $population): self
    {
        $this->population = $population;

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
     * @return Collection|Test[]
     */
    public function getTests(): Collection
    {
        return $this->tests;
    }

    public function addTest(Test $test): self
    {
        if (!$this->tests->contains($test)) {
            $this->tests[] = $test;
            $test->setTownId($this);
        }

        return $this;
    }

    public function removeTest(Test $test): self
    {
        if ($this->tests->removeElement($test)) {
            // set the owning side to null (unless already changed)
            if ($test->getTownId() === $this) {
                $test->setTownId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Record[]
     */
    public function getRecords(): Collection
    {
        return $this->records;
    }

    public function addRecord(Record $record): self
    {
        if (!$this->records->contains($record)) {
            $this->records[] = $record;
            $record->setTownId($this);
        }

        return $this;
    }

    public function removeRecord(Record $record): self
    {
        if ($this->records->removeElement($record)) {
            // set the owning side to null (unless already changed)
            if ($record->getTownId() === $this) {
                $record->setTownId(null);
            }
        }

        return $this;
    }
}
