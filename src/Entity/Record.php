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
     * @ORM\ManyToOne(targetEntity=Town::class, inversedBy="records")
     * @ORM\JoinColumn(nullable=false)
     */
    private $townId;

    /**
     * @ORM\Column(type="integer")
     */
    private $week_num;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $asympCases;

    /**
     * @ORM\Column(type="integer")
     */
    private $sympCases;

    /**
     * @ORM\Column(type="integer")
     */
    private $reaCases;

    /**
     * @ORM\Column(type="integer")
     */
    private $deathCases;

    /**
     * @ORM\Column(type="integer")
     */
    private $tests;

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

    public function getWeekNum(): ?int
    {
        return $this->week_num;
    }

    public function setWeekNum(int $week_num): self
    {
        $this->week_num = $week_num;

        return $this;
    }

    public function getAsympCases(): ?int
    {
        return $this->asympCases;
    }

    public function setAsympCases(?int $asympCases): self
    {
        $this->asympCases = $asympCases;

        return $this;
    }

    public function getSympCases(): ?int
    {
        return $this->sympCases;
    }

    public function setSympCases(int $sympCases): self
    {
        $this->sympCases = $sympCases;

        return $this;
    }

    public function getReaCases(): ?int
    {
        return $this->reaCases;
    }

    public function setReaCases(int $reaCases): self
    {
        $this->reaCases = $reaCases;

        return $this;
    }

    public function getDeathCases(): ?int
    {
        return $this->deathCases;
    }

    public function setDeathCases(int $deathCases): self
    {
        $this->deathCases = $deathCases;

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
