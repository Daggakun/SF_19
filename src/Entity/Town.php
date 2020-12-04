<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Town
 *
 * @ORM\Table(name="town", indexes={@ORM\Index(name="department_id", columns={"department_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\TownRepository")
 *
 */
class Town
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
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="lat", type="string", length=10, nullable=false)
     */
    private $lat;

    /**
     * @var string
     *
     * @ORM\Column(name="lng", type="string", length=10, nullable=false)
     */
    private $lng;

    /**
     * @var int
     *
     * @ORM\Column(name="population", type="integer", nullable=false)
     */
    private $population;

    /**
     * @var int|null
     *
     * @ORM\Column(name="reabeds", type="integer", nullable=true)
     */
    private $reabeds;

    /**
     * @var \Department
     *
     * @ORM\ManyToOne(targetEntity="Department")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="department_id", referencedColumnName="id")
     * })
     */
    private $department;

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

    public function getReabeds(): ?int
    {
        return $this->reabeds;
    }

    public function setReabeds(?int $reabeds): self
    {
        $this->reabeds = $reabeds;

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
