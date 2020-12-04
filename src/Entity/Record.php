<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Record
 *
 * @ORM\Table(name="record", indexes={@ORM\Index(name="town_id", columns={"town_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\RecordRepository")
 */
class Record
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
     * @var int
     *
     * @ORM\Column(name="week_num", type="integer", nullable=false)
     */
    private $weekNum;

    /**
     * @var int
     *
     * @ORM\Column(name="asymp_cases", type="integer", nullable=false)
     */
    private $asympCases;

    /**
     * @var int
     *
     * @ORM\Column(name="symp_cases", type="integer", nullable=false)
     */
    private $sympCases;

    /**
     * @var int
     *
     * @ORM\Column(name="rea_cases", type="integer", nullable=false)
     */
    private $reaCases;

    /**
     * @var int
     *
     * @ORM\Column(name="death_cases", type="integer", nullable=false)
     */
    private $deathCases;

    /**
     * @var int
     *
     * @ORM\Column(name="tests", type="integer", nullable=false)
     */
    private $tests;

    /**
     * @var \Town
     *
     * @ORM\ManyToOne(targetEntity="Town")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="town_id", referencedColumnName="id")
     * })
     */
    private $town;

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

    public function getAsympCases(): ?int
    {
        return $this->asympCases;
    }

    public function setAsympCases(int $asympCases): self
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

    public function getTown(): ?Town
    {
        return $this->town;
    }

    public function setTown(?Town $town): self
    {
        $this->town = $town;

        return $this;
    }


}
