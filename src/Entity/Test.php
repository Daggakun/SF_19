<?php

namespace App\Entity;

use App\Repository\TestRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TestRepository::class)
 */
class Test
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Town::class, inversedBy="tests")
     * @ORM\JoinColumn(nullable=false)
     */
    private $townId;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $result;

    /**
     * @ORM\Column(type="integer")
     */
    private $weekNum;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $caseType;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTownId(): ?Town
    {
        return $this->townId;
    }

    public function setTownId(?Town $townId): self
    {
        $this->townId = $townId;

        return $this;
    }

    public function getResult(): ?string
    {
        return $this->result;
    }

    public function setResult(string $result): self
    {
        $this->result = $result;

        return $this;
    }

    public function getWeekNum(): ?int
    {
        return $this->weekNum;
    }

    public function setWeekNum(int $weekNum): self
    {
        $this->weekNum = $weekNum;

        return $this;
    }

    public function getCaseType(): ?string
    {
        return $this->caseType;
    }

    public function setCaseType(?string $caseType): self
    {
        $this->caseType = $caseType;

        return $this;
    }
}
