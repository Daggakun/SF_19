<?php

namespace App\Entity;

use App\Repository\TestRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Test
 *
 * @ORM\Table(name="test", indexes={@ORM\Index(name="town_id", columns={"town_id"})})
 * @ORM\Entity(repositoryClass=TestRepository::class)
 */
class Test
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
     * @ORM\Column(name="result", type="string", length=10, nullable=false)
     */
    private $result;

    /**
     * @var int
     *
     * @ORM\Column(name="week_num", type="integer", nullable=false)
     */
    private $weekNum;

    /**
     * @var string|null
     *
     * @ORM\Column(name="case_type", type="string", length=10, nullable=true)
     */
    private $caseType;

    /**
     * @var \Town
     *
     * @ORM\ManyToOne(targetEntity=Town::class, inversedBy="tests")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="town_id", referencedColumnName="id")
     * })
     */
    private $town;

    public function getId(): ?int
    {
        return $this->id;
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
