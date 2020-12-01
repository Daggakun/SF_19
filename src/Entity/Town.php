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
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="bigint")
     */
    private $inhabitants;

    /**
     * @ORM\Column(type="integer")
     */
    private $reanimationBeds;

    /**
     * @ORM\OneToMany(targetEntity=Test::class, mappedBy="town")
     */
    private $tests;

    /**
     * @ORM\OneToOne(targetEntity=Record::class, mappedBy="town", cascade={"persist", "remove"})
     */
    private $record;

    /**
     * @ORM\ManyToOne(targetEntity=Department::class, inversedBy="towns")
     * @ORM\JoinColumn(nullable=false)
     */
    private $department;

    public function __construct()
    {
        $this->tests = new ArrayCollection();
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

    public function getInhabitants(): ?string
    {
        return $this->inhabitants;
    }

    public function setInhabitants(string $inhabitants): self
    {
        $this->inhabitants = $inhabitants;

        return $this;
    }

    public function getReanimationBeds(): ?int
    {
        return $this->reanimationBeds;
    }

    public function setReanimationBeds(int $reanimationBeds): self
    {
        $this->reanimationBeds = $reanimationBeds;

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
            $test->setTown($this);
        }

        return $this;
    }

    public function removeTest(Test $test): self
    {
        if ($this->tests->removeElement($test)) {
            // set the owning side to null (unless already changed)
            if ($test->getTown() === $this) {
                $test->setTown(null);
            }
        }

        return $this;
    }

    public function getRecord(): ?Record
    {
        return $this->record;
    }

    public function setRecord(Record $record): self
    {
        $this->record = $record;

        // set the owning side of the relation if necessary
        if ($record->getTown() !== $this) {
            $record->setTown($this);
        }

        return $this;
    }

    public function getDepartment(): ?Department
    {
        return $this->department;
    }

    public function setDepartment(?Department $department): self
    {
        $this->department = $department;

        return $this;
    }
}
