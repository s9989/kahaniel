<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    const OTHER_TYPE = 3;

    const VAT_INVOICE_CATEGORY_TEXT = 'Faktura VAT';
    const MARGIN_INVOICE_CATEGORY_TEXT = 'Faktura VAT marża';
    const AMORTIZATION_CATEGORY_TEXT = 'Amortyzacja';
    const OTHER_CATEGORY_TEXT = 'Inny dokument';

    const TRANSFER_PAYMENT_TYPE_TEXT = 'Przelew';
    const CASH_PAYMENT_TYPE_TEXT = 'Gotówka';

    const CATEGORIES = [
        0 => self::OTHER_CATEGORY_TEXT,
        1 => self::VAT_INVOICE_CATEGORY_TEXT,
        2 => self::MARGIN_INVOICE_CATEGORY_TEXT,
        3 => self::AMORTIZATION_CATEGORY_TEXT,
    ];

    const PAYMENT_TYPES = [
        1 => self::TRANSFER_PAYMENT_TYPE_TEXT,
        2 => self::CASH_PAYMENT_TYPE_TEXT,
    ];

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
     * @ORM\Column(type="integer", nullable=false)
     * @var integer
     */
    private $paymentType;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     * @var string
     */
    private $accountNumber;

    /**
     * @ORM\OneToMany(targetEntity="Position", mappedBy="document", cascade={"persist"})
     * @var Collection
     */
    private $positions;

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
     * @ORM\ManyToMany(targetEntity="User", inversedBy="documents", cascade={"persist"})
     */
    private $viewers;

    public function __construct()
    {
        $this->type = self::OTHER_TYPE;
        $this->paymentType = 1;
        $this->issueDate = new \DateTime();
        $this->paymentDate = new \DateTime();
        $this->description = '';
        $this->viewers = new ArrayCollection();
        $this->positions = new ArrayCollection();
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
     */
    public function setId($id): void
    {
        $this->id = $id;
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
     */
    public function setType(int $type): void
    {
        $this->type = $type;
    }

    /**
     * @param Company $company
     */
    public function determineType(Company $company): void
    {
        if ($company->getId() == $this->getSeller()->getId()) {
            $this->setType(self::PROFIT_TYPE);
        }

        if ($company->getId() == $this->getBuyer()->getId()) {
            $this->setType(self::COST_TYPE);
        }
    }

    /**
     * @return int
     */
    public function getCategory(): ?int
    {
        return $this->category;
    }

    /**
     * @return string
     */
    public function getCategoryText(): string
    {
        return self::CATEGORIES[$this->getCategory()];
    }

    /**
     * @param int $category
     */
    public function setCategory(int $category): void
    {
        $this->category = $category;
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
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
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
     */
    public function setDescription(string $description = null): void
    {
        $this->description = $description;
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
     */
    public function setNumber(string $number): void
    {
        $this->number = $number;
    }

    /**
     * @return int
     */
    public function getPaymentType(): int
    {
        return $this->paymentType;
    }

    /**
     * @return string
     */
    public function getPaymentTypeText(): string
    {
        if (!array_key_exists($this->getPaymentType(), self::PAYMENT_TYPES)) {
            return '';
        }

        return self::PAYMENT_TYPES[$this->getPaymentType()];
    }

    /**
     * @param int $paymentType
     */
    public function setPaymentType(int $paymentType): void
    {
        $this->paymentType = $paymentType;
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
     */
    public function setAccountNumber(string $accountNumber): void
    {
        $this->accountNumber = $accountNumber;
    }

    /**
     * @return Collection|Position[]
     */
    public function getPositions(): Collection
    {
        return $this->positions;
    }

    /**
     * @param Collection|Position[] $positions
     */
    public function setPositions(Collection $positions): void
    {
        $this->positions = $positions;
    }

    /**
     * @param Position $position
     */
    public function addPosition(Position $position): void
    {
        $this->positions->add($position);
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
     */
    public function setBuyer(Company $buyer): void
    {
        $this->buyer = $buyer;
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
     */
    public function setSeller(Company $seller): void
    {
        $this->seller = $seller;
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
     */
    public function setIssueDate(\DateTime $issueDate): void
    {
        $this->issueDate = $issueDate;
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
     */
    public function setPaymentDate(\DateTime $paymentDate): void
    {
        $this->paymentDate = $paymentDate;
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
     */
    public function setPlace(string $place): void
    {
        $this->place = $place;
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
     */
    public function setNet(int $net): void
    {
        $this->net = $net;
    }

    public function calculateNet(): int
    {
        $net = 0;
        foreach ($this->getPositions() as $position) {
            $net += $position->getNet();
        }
        return $net;
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
     */
    public function setTaxPercent(int $taxPercent): void
    {
        $this->taxPercent = $taxPercent;
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
     */
    public function setTax(int $tax): void
    {
        $this->tax = $tax;
    }

    public function calculateTax(): int
    {
        $tax = 0;
        foreach ($this->getPositions() as $position) {
            $tax += $position->getTaxTotal();
        }
        return $tax;
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
     */
    public function setGross(int $gross): void
    {
        $this->gross = $gross;
    }

    public function calculateGross(): int
    {
        $gross = 0;
        foreach ($this->getPositions() as $position) {
            $gross += $position->getGrossTotal();
        }
        return $gross;
    }

    /**
     * @return int
     */
    public function getNetTotal(): int
    {
        $total = 0;
        foreach ($this->getPositions() as $position) {
            $total += $position->getNetTotal();
        }
        return $total;
    }

    /**
     * @return int
     */
    public function getTaxTotal(): int
    {
        $total = 0;
        foreach ($this->getPositions() as $position) {
            $total += $position->getTaxTotal();
        }
        return $total;
    }

    /**
     * @return int
     */
    public function getGrossTotal(): int
    {
        $total = 0;
        foreach ($this->getPositions() as $position) {
            $total += $position->getGrossTotal();
        }
        return $total;
    }


    /**
     * @return Collection
     */
    public function getViewers(): Collection
    {
        return $this->viewers;
    }

    /**
     * @param Collection $viewers
     */
    public function setViewers(Collection $viewers): void
    {
        $this->viewers = $viewers;
    }

    /**
     * @param User $user
     */
    public function addViewer(User $user)
    {
        if ($this->viewers->contains($user)) {
            return;
        }

        $this->viewers[] = ($user);
    }
}
