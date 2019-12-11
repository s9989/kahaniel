<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;
use Exception;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SocialInsurancePaymentRepository")
 */
class SocialInsurancePayment
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var Company
     * @ORM\ManyToOne(targetEntity="Company")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     */
    private $company;

    /**
     * @var SocialInsuranceBase
     * @ORM\ManyToOne(targetEntity="SocialInsuranceBase")
     * @ORM\JoinColumn(name="social_insurance_base_id", referencedColumnName="id")
     */
    private $socialInsuranceBase;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=false)
     */
    private $other;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=false)
     */
    private $retirement;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=false)
     */
    private $sickness;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=false)
     */
    private $accident;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=false)
     */
    private $health;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=false)
     */
    private $labor;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=false)
     */
    private $month;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=false)
     */
    private $year;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return SocialInsuranceBase
     */
    public function getSocialInsuranceBase(): SocialInsuranceBase
    {
        return $this->socialInsuranceBase;
    }

    /**
     * @param SocialInsuranceBase $socialInsuranceBase
     */
    public function setSocialInsuranceBase(SocialInsuranceBase $socialInsuranceBase): void
    {
        $this->socialInsuranceBase = $socialInsuranceBase;
    }

    /**
     * @return int
     */
    public function getOther(): int
    {
        return $this->other;
    }

    /**
     * @param int $other
     */
    public function setOther(int $other): void
    {
        $this->other = $other;
    }

    /**
     * @return int
     */
    public function getRetirement(): int
    {
        return $this->retirement;
    }

    /**
     * @param int $retirement
     */
    public function setRetirement(int $retirement): void
    {
        $this->retirement = $retirement;
    }

    /**
     * @return int
     */
    public function getSickness(): int
    {
        return $this->sickness;
    }

    /**
     * @param int $sickness
     */
    public function setSickness(int $sickness): void
    {
        $this->sickness = $sickness;
    }

    /**
     * @return int
     */
    public function getAccident(): int
    {
        return $this->accident;
    }

    /**
     * @param int $accident
     */
    public function setAccident(int $accident): void
    {
        $this->accident = $accident;
    }

    /**
     * @return int
     */
    public function getHealth(): int
    {
        return $this->health;
    }

    /**
     * @param int $health
     */
    public function setHealth(int $health): void
    {
        $this->health = $health;
    }

    /**
     * @return Company
     */
    public function getCompany(): Company
    {
        return $this->company;
    }

    /**
     * @param Company $company
     */
    public function setCompany(Company $company): void
    {
        $this->company = $company;
    }

    /**
     * @return int
     */
    public function getLabor(): int
    {
        return $this->labor;
    }

    /**
     * @param int $labor
     */
    public function setLabor(int $labor): void
    {
        $this->labor = $labor;
    }

    /**
     * @return DateTime
     * @throws Exception
     */
    public function getDate(): DateTime
    {
        return new DateTime(sprintf("%s/%s/01", $this->getYear(), $this->getMonth()));
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->getRetirement() + $this->getOther() + $this->getAccident() + $this->getSickness() + $this->getHealth();
    }

    /**
     * @return int
     */
    public function getMonth(): int
    {
        return $this->month;
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
}
