<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @var User
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var SocialInsuranceBase
     * @ORM\OneToOne(targetEntity="SocialInsuranceBase")
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


    public function getId()
    {
        return $this->id;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return SocialInsurancePayment
     */
    public function setUser(User $user): SocialInsurancePayment
    {
        $this->user = $user;
        return $this;
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
     * @return SocialInsurancePayment
     */
    public function setSocialInsuranceBase(SocialInsuranceBase $socialInsuranceBase): SocialInsurancePayment
    {
        $this->socialInsuranceBase = $socialInsuranceBase;
        return $this;
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
     * @return SocialInsurancePayment
     */
    public function setOther(int $other): SocialInsurancePayment
    {
        $this->other = $other;
        return $this;
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
     * @return SocialInsurancePayment
     */
    public function setRetirement(int $retirement): SocialInsurancePayment
    {
        $this->retirement = $retirement;
        return $this;
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
     * @return SocialInsurancePayment
     */
    public function setSickness(int $sickness): SocialInsurancePayment
    {
        $this->sickness = $sickness;
        return $this;
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
     * @return SocialInsurancePayment
     */
    public function setAccident(int $accident): SocialInsurancePayment
    {
        $this->accident = $accident;
        return $this;
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
     * @return SocialInsurancePayment
     */
    public function setHealth(int $health): SocialInsurancePayment
    {
        $this->health = $health;
        return $this;
    }
}
