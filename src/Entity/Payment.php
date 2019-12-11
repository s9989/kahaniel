<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;
use Exception;

/**
 * @ORM\Entity()
 */
class Payment
{
    const VAT_TYPE = 1;
    const PIT_TYPE = 2;

    const TYPE_TEXT = [
        self::VAT_TYPE => 'Podatek VAT',
        self::PIT_TYPE => 'Podatek dochodowy PIT',
    ];

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @var Company
     * @ORM\ManyToOne(targetEntity="Company")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     */
    private $company;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $type;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $month;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $year;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $profits;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $costs;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $total;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getTypeText(): string
    {
        if (!array_key_exists($this->getType(), self::TYPE_TEXT)) {
            return '';
        }

        return self::TYPE_TEXT[$this->getType()];
    }

    /**
     * @param int $type
     */
    public function setType(int $type): void
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getProfits(): int
    {
        return $this->profits;
    }

    /**
     * @param int $profits
     */
    public function setProfits(int $profits): void
    {
        $this->profits = $profits;
    }

    /**
     * @return int
     */
    public function getCosts(): int
    {
        return $this->costs;
    }

    /**
     * @param int $costs
     */
    public function setCosts(int $costs): void
    {
        $this->costs = $costs;
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * @param int $total
     */
    public function setTotal(int $total): void
    {
        $this->total = $total;
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
     * @param SocialInsurancePayment|null $socialPayment
     */
    public function calculateTotal(SocialInsurancePayment $socialPayment = null): void
    {
        $total = $this->getProfits() - $this->getCosts();

        if ($this->getType() === self::PIT_TYPE) {

            if ($total < 0) {
                $total = 0;
            }

            $total = round($total * 19 / 100);

            if ($socialPayment) {
                $total -= round(round($socialPayment->getSocialInsuranceBase()->getAverageSalary() * 75 / 100) * 775 / 10000);
            }
        }

        $this->setTotal($total);
    }

    /**
     * @return DateTime
     * @throws Exception
     */
    public function getDate(): DateTime
    {
        return new DateTime(sprintf("%s/%s/01", $this->getYear(), $this->getMonth()));
    }
}
