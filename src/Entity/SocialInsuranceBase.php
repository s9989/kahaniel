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
     * @var integer
     * @ORM\Column(type="integer", name="minimal_salary")
     */
    private $minimalSalary;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="average_salary")
     */
    private $averageSalary;

    /**
     * Other Pension Insurance Contribution Percent
     * @var integer
     * @ORM\Column(type="integer", name="other_percent")
     */
    private $otherPercent;

    /**
     * Retirement Pension Insurance Contribution Percent
     * @var integer
     * @ORM\Column(type="integer", name="retirement_percent")
     */
    private $retirementPercent;

    /**
     * Sickness Insurance Contribution Percent
     * @var integer
     * @ORM\Column(type="integer", name="sickness_percent")
     */
    private $sicknessPercent;

    /**
     * Accident Insurance Contribution Percent
     * @var integer
     * @ORM\Column(type="integer", name="accident_percent")
     */
    private $accidentPercent;

    /**
     * Health Insurance Contribution Percent
     * @var integer
     * @ORM\Column(type="integer", name="health_percent")
     */
    private $healthPercent;

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
     * @return SocialInsuranceBase
     */
    public function setYear(int $year): SocialInsuranceBase
    {
        $this->year = $year;
        return $this;
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
        return $this->getDate()->format('F, Y');
    }

    /**
     * @param int $month
     * @return SocialInsuranceBase
     */
    public function setMonth(int $month): SocialInsuranceBase
    {
        $this->month = $month;
        return $this;
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
     * @return SocialInsuranceBase
     */
    public function setMinimalSalary(int $minimalSalary): SocialInsuranceBase
    {
        $this->minimalSalary = $minimalSalary;
        return $this;
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
     * @return SocialInsuranceBase
     */
    public function setAverageSalary(int $averageSalary): SocialInsuranceBase
    {
        $this->averageSalary = $averageSalary;
        return $this;
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
     * @return SocialInsuranceBase
     */
    public function setOtherPercent(int $otherPercent): SocialInsuranceBase
    {
        $this->otherPercent = $otherPercent;
        return $this;
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
     * @return SocialInsuranceBase
     */
    public function setRetirementPercent(int $retirementPercent): SocialInsuranceBase
    {
        $this->retirementPercent = $retirementPercent;
        return $this;
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
     * @return SocialInsuranceBase
     */
    public function setSicknessPercent(int $sicknessPercent): SocialInsuranceBase
    {
        $this->sicknessPercent = $sicknessPercent;
        return $this;
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
     * @return SocialInsuranceBase
     */
    public function setAccidentPercent(int $accidentPercent): SocialInsuranceBase
    {
        $this->accidentPercent = $accidentPercent;
        return $this;
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
     * @return SocialInsuranceBase
     */
    public function setHealthPercent(int $healthPercent): SocialInsuranceBase
    {
        $this->healthPercent = $healthPercent;
        return $this;
    }
}
