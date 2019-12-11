<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SocialInsuranceBaseRepository")
 */
class SocialInsuranceBase
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $year;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $month;

    /**
     * Minimalne wynagrodzenie
     * @var integer
     * @ORM\Column(type="integer", name="minimal_salary")
     */
    private $minimalSalary;

    /**
     * Przeciętne wynagrodzenie
     * @var integer
     * @ORM\Column(type="integer", name="average_salary")
     */
    private $averageSalary;

    /**
     * Ubezpieczenie rentowe
     * @var integer
     * @ORM\Column(type="integer", name="other_percent")
     */
    private $otherPercent;

    /**
     * Ubezpieczenie emerytalne
     * @var integer
     * @ORM\Column(type="integer", name="retirement_percent")
     */
    private $retirementPercent;

    /**
     * Ubezpieczenie chorobowe
     * @var integer
     * @ORM\Column(type="integer", name="sickness_percent")
     */
    private $sicknessPercent;

    /**
     * Ubezpieczenie wypadkowe
     * @var integer
     * @ORM\Column(type="integer", name="accident_percent")
     */
    private $accidentPercent;

    /**
     * Ubezpieczenie zdrowotne
     * @var integer
     * @ORM\Column(type="integer", name="health_percent")
     */
    private $healthPercent;

    /**
     * Fundusz pracy
     * @var integer
     * @ORM\Column(type="integer", name="labor_percent")
     */
    private $laborPercent;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @param int $year
     */
    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    /**
     * @return int
     */
    public function getMonth(): int
    {
        return $this->month;
    }

    public function getDate(): \DateTime
    {
        return new \DateTime("{$this->getYear()}-{$this->getMonth()}-01");
    }

    public function getFullMonth(): string
    {
        return $this->getDate()->format('F, xxY');
    }

    /**
     * @param int $month
     */
    public function setMonth(int $month): void
    {
        $this->month = $month;
    }

    /**
     * @return int
     */
    public function getMinimalSalary(): int
    {
        return $this->minimalSalary;
    }

    /**
     * @param int $minimalSalary
     */
    public function setMinimalSalary(int $minimalSalary): void
    {
        $this->minimalSalary = $minimalSalary;
    }

    /**
     * @return int
     */
    public function getAverageSalary(): int
    {
        return $this->averageSalary;
    }

    /**
     * @param int $averageSalary
     */
    public function setAverageSalary(int $averageSalary): void
    {
        $this->averageSalary = $averageSalary;
    }

    /**
     * @return int
     */
    public function getOtherPercent(): int
    {
        return $this->otherPercent;
    }

    /**
     * @param int $otherPercent
     */
    public function setOtherPercent(int $otherPercent): void
    {
        $this->otherPercent = $otherPercent;
    }

    /**
     * @return int
     */
    public function getRetirementPercent(): int
    {
        return $this->retirementPercent;
    }

    /**
     * @param int $retirementPercent
     */
    public function setRetirementPercent(int $retirementPercent): void
    {
        $this->retirementPercent = $retirementPercent;
    }

    /**
     * @return int
     */
    public function getSicknessPercent(): int
    {
        return $this->sicknessPercent;
    }

    /**
     * @param int $sicknessPercent
     */
    public function setSicknessPercent(int $sicknessPercent): void
    {
        $this->sicknessPercent = $sicknessPercent;
    }

    /**
     * @return int
     */
    public function getAccidentPercent(): int
    {
        return $this->accidentPercent;
    }

    /**
     * @param int $accidentPercent
     */
    public function setAccidentPercent(int $accidentPercent): void
    {
        $this->accidentPercent = $accidentPercent;
    }

    /**
     * @return int
     */
    public function getHealthPercent(): int
    {
        return $this->healthPercent;
    }

    /**
     * @param int $healthPercent
     */
    public function setHealthPercent(int $healthPercent): void
    {
        $this->healthPercent = $healthPercent;
    }

    /**
     * @return int
     */
    public function getLaborPercent(): int
    {
        return $this->laborPercent;
    }

    /**
     * @param int $laborPercent
     */
    public function setLaborPercent(int $laborPercent): void
    {
        $this->laborPercent = $laborPercent;
    }
}
