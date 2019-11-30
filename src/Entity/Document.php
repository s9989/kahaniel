<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DocumentRepository")
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false, hardDelete=true)
 */
class Document
{
    const PROFIT_TYPE = 1;
    const COST_TYPE = 2;

    use SoftDeleteable;

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
     * @ORM\Column(type="integer", nullable=false)
     * @var integer
     */
    private $category;

    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     * @var string
     * @Assert\NotBlank(message="Tytuł nie może być pusty")
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Tytuł nie może mieć mniej niż {{ limit }} znaki",
     *      maxMessage = "Tytuł nie może mieć więcej niż {{ limit }} znaków"
     * )
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     * @Assert\Length(
     *      max = 255,
     *      maxMessage = "Opis nie może być krótszy niż {{ limit }} znaków"
     * )
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=40, nullable=false)
     * @var string
     * @Assert\NotBlank(message="Numer konta jest wymagany")
     * @Assert\Length(
     *      min = 4,
     *      max = 40,
     *      minMessage = "Numer nie może mieć mniej niż {{ limit }} znaki",
     *      maxMessage = "Numer nie może mieć więcej niż {{ limit }} znaków"
     * )
     */
    private $number;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     * @var string
     * @Assert\NotBlank(message="Numer konta jest wymagany")
     * @Assert\Length(
     *      min = 26,
     *      max = 26,
     *      exactMessage="Numer konta musi mieć dokładnie {{ limit }} znaków"
     * )
     */
    private $accountNumber;

    /**
     * @ORM\ManyToOne(targetEntity="Company")
     * @ORM\JoinColumn(name="buyer_id", referencedColumnName="id", nullable=true)
     * @var Company
     */
    private $buyer;

    /**
     * @ORM\ManyToOne(targetEntity="Company")
     * @ORM\JoinColumn(name="seller_id", referencedColumnName="id", nullable=true)
     * @var Company
     */
    private $seller;

    /**
     * @ORM\Column(name="issue_date", type="date", nullable=false)
     * @var \DateTime
     * @Assert\NotBlank(message="Data wystawienia jest wymagana")
     */
    private $issueDate;

    /**
     * @ORM\Column(name="payment_date", type="date", nullable=false)
     * @var \DateTime
     * @Assert\NotBlank(message="Data płatności jest wymagana")
     */
    private $paymentDate;

    /**
     * @ORM\Column(type="string", length=40, nullable=false)
     * @var string
     * @Assert\NotBlank(message="Miejsce jest wymagane")
     * @Assert\Length(
     *      max = 60,
     *      maxMessage="Miejsce musi mieć nie więcej niż {{ limit }} znaków"
     * )
     */
    private $place;

    /**
     * @ORM\Column(type="integer", nullable=false)
     * @var integer
     * @Assert\NotBlank(message="Kwota netto jest wymagana")
     */
    private $net;

    /**
     * @ORM\Column(type="integer", name="tax_percent", nullable=false)
     * @var integer
     * @Assert\NotBlank(message="Procent podatku jest wymagany")
     */
    private $taxPercent;

    /**
     * @ORM\Column(type="integer", nullable=false)
     * @var integer
     * @Assert\NotBlank(message="Wartość podatku jest wymagana")
     */
    private $tax;

    /**
     * @ORM\Column(type="integer", nullable=false)
     * @var integer
     * @Assert\NotBlank(message="Kwota brutto jest wymagana")
     */
    private $gross;

    /**
     * Many Users have Many Documents.
     * @ORM\ManyToMany(targetEntity="User", inversedBy="documents")
     */
    private $viewers;

    public function __construct()
    {
        $this->issueDate = new \DateTime();
        $this->paymentDate = new \DateTime();
        $this->description = '';
        $this->viewers = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Document
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
     * @return Document
     */
    public function setType(int $type): Document
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return int
     */
    public function getCategory(): ?int
    {
        return $this->category;
    }

    /**
     * @param int $category
     * @return Document
     */
    public function setCategory(int $category): Document
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Document
     */
    public function setTitle(string $title): Document
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Document
     */
    public function setDescription(string $description = null): Document
    {
        $this->description = $description;
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
     * @return Document
     */
    public function setNumber(string $number): Document
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
     * @return Document
     */
    public function setAccountNumber(string $accountNumber): Document
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
     * @return Document
     */
    public function setBuyer(Company $buyer): Document
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
     * @return Document
     */
    public function setSeller(Company $seller): Document
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
     * @return Document
     */
    public function setIssueDate(\DateTime $issueDate): Document
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
     * @return Document
     */
    public function setPaymentDate(\DateTime $paymentDate): Document
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
     * @return Document
     */
    public function setPlace(string $place): Document
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
     * @return Document
     */
    public function setNet(int $net): Document
    {
        $this->net = $net;
        return $this;
    }

    /**
     * @return int
     */
    public function getTaxPercent(): ?int
    {
        return $this->taxPercent;
    }

    /**
     * @param int $taxPercent
     * @return Document
     */
    public function setTaxPercent(int $taxPercent): Document
    {
        $this->taxPercent = $taxPercent;
        return $this;
    }

    /**
     * @return int
     */
    public function getTax(): ?int
    {
        return $this->tax;
    }

    /**
     * @param int $tax
     * @return Document
     */
    public function setTax(int $tax): Document
    {
        $this->tax = $tax;
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
     * @return Document
     */
    public function setGross(int $gross): Document
    {
        $this->gross = $gross;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getViewers(): ArrayCollection
    {
        return $this->viewers;
    }

    /**
     * @param ArrayCollection $viewers
     */
    public function setViewers(ArrayCollection $viewers): void
    {
        $this->viewers = $viewers;
    }
}
