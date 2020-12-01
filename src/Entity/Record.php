<?php

namespace App\Entity;

use App\Repository\RecordRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecordRepository::class)
 */
class Record
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $weekNum;

    /**
     * @ORM\Column(type="bigint")
     */
    private $asympCases;

    /**
     * @ORM\Column(type="bigint")
     */
    private $sympCases;

    /**
     * @ORM\Column(type="bigint")
     */
    private $reaCases;

    /**
     * @ORM\Column(type="bigint")
     */
    private $deathsCases;

    /**
     * @ORM\OneToOne(targetEntity=Town::class, inversedBy="record", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $town;

    /**
     * @ORM\Column(type="integer")
     */
    private $tests;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAsympCases(): ?string
    {
        return $this->asympCases;
    }

    public function setAsympCases(string $asympCases): self
    {
        $this->asympCases = $asympCases;

        return $this;
    }

    public function getSympCases(): ?string
    {
        return $this->sympCases;
    }

    public function setSympCases(string $sympCases): self
    {
        $this->sympCases = $sympCases;

        return $this;
    }

    public function getReaCases(): ?string
    {
        return $this->reaCases;
    }

    public function setReaCases(string $reaCases): self
    {
        $this->reaCases = $reaCases;

        return $this;
    }

    public function getDeathsCases(): ?string
    {
        return $this->deathsCases;
    }

    public function setDeathsCases(string $deathsCases): self
    {
        $this->deathsCases = $deathsCases;

        return $this;
    }

    public function getTown(): ?Town
    {
        return $this->town;
    }

    public function setTown(Town $town): self
    {
        $this->town = $town;

        return $this;
    }

    public function getTests(): ?int
    {
        return $this->tests;
    }

    public function setTests(int $tests): self
    {
        $this->tests = $tests;

        return $this;
    }
}
