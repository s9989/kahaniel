<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InvoiceRepository")
 */
class Invoice
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=false)
     * @var integer
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=40, nullable=false)
     * @var string
     */
    private $number;

    /**
     * @ORM\Column(type="string", length=60, nullable=false)
     * @var string
     */
    private $accountNumber;

    /**
     * @ORM\ManyToOne(targetEntity="Company")
     * @ORM\JoinColumn(name="buyer_id", referencedColumnName="id")
     * @var Company
     */
    private $buyer;

    /**
     * @ORM\ManyToOne(targetEntity="Company")
     * @ORM\JoinColumn(name="seller_id", referencedColumnName="id")
     * @var Company
     */
    private $seller;

    /**
     * @ORM\Column(name="issue_date", type="date", nullable=false)
     * @var \DateTime
     */
    private $issueDate;

    /**
     * @ORM\Column(name="payment_date", type="date", nullable=false)
     * @var \DateTime
     */
    private $paymentDate;

    /**
     * @ORM\Column(type="string", length=40, nullable=false)
     * @var string
     */
    private $place;

    /**
     * @ORM\Column(type="integer")
     * @var integer
     */
    private $net;

    /**
     * @ORM\Column(type="integer")
     * @var integer
     */
    private $gross;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Invoice
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getType(): ?int
    {
        return $this->type;
    }

    /**
     * @param int $type
     * @return Invoice
     */
    public function setType(int $type): Invoice
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumber(): ?string
    {
        return $this->number;
    }

    /**
     * @param string $number
     * @return Invoice
     */
    public function setNumber(string $number): Invoice
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccountNumber(): ?string
    {
        return $this->accountNumber;
    }

    /**
     * @param string $accountNumber
     * @return Invoice
     */
    public function setAccountNumber(string $accountNumber): Invoice
    {
        $this->accountNumber = $accountNumber;
        return $this;
    }

    /**
     * @return Company
     */
    public function getBuyer(): ?Company
    {
        return $this->buyer;
    }

    /**
     * @param Company $buyer
     * @return Invoice
     */
    public function setBuyer(Company $buyer): Invoice
    {
        $this->buyer = $buyer;
        return $this;
    }

    /**
     * @return Company
     */
    public function getSeller(): ?Company
    {
        return $this->seller;
    }

    /**
     * @param Company $seller
     * @return Invoice
     */
    public function setSeller(Company $seller): Invoice
    {
        $this->seller = $seller;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getIssueDate(): ?\DateTime
    {
        return $this->issueDate;
    }

    /**
     * @param \DateTime $issueDate
     * @return Invoice
     */
    public function setIssueDate(\DateTime $issueDate): Invoice
    {
        $this->issueDate = $issueDate;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getPaymentDate(): ?\DateTime
    {
        return $this->paymentDate;
    }

    /**
     * @param \DateTime $paymentDate
     * @return Invoice
     */
    public function setPaymentDate(\DateTime $paymentDate): Invoice
    {
        $this->paymentDate = $paymentDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getPlace(): ?string
    {
        return $this->place;
    }

    /**
     * @param string $place
     * @return Invoice
     */
    public function setPlace(string $place): Invoice
    {
        $this->place = $place;
        return $this;
    }

    /**
     * @return int
     */
    public function getNet(): ?int
    {
        return $this->net;
    }

    /**
     * @param int $net
     * @return Invoice
     */
    public function setNet(int $net): Invoice
    {
        $this->net = $net;
        return $this;
    }

    /**
     * @return int
     */
    public function getGross(): ?int
    {
        return $this->gross;
    }

    /**
     * @param int $gross
     * @return Invoice
     */
    public function setGross(int $gross): Invoice
    {
        $this->gross = $gross;
        return $this;
    }
}
