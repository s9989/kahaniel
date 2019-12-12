<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false, hardDelete=true)
 */
class Position
{
    use SoftDeleteable;

    const SERVICE_UNIT = 1;
    const ITEM_UNIT = 2;
    const KILOGRAM_UNIT = 3;
    const LITER_UNIT = 4;

    const UNIT_TEXT = [
        self::SERVICE_UNIT =>'Usługa',
        self::ITEM_UNIT =>'Sztuka',
        self::KILOGRAM_UNIT =>'Kilogram',
        self::LITER_UNIT =>'Litr',
    ];

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Document", inversedBy="positions")
     * @ORM\JoinColumn(name="document_id", referencedColumnName="id")
     * @var Document
     */
    private $document;

    /**
     * @ORM\Column(type="integer", nullable=false)
     * @var integer
     */
    private $position = 1;

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
     * @ORM\Column(type="string", nullable=false)
     * @var string
     */
    private $category;

    /**
     * @ORM\Column(type="integer", nullable=false)
     * @var integer
     */
    private $unit;

    /**
     * @ORM\Column(type="integer", nullable=false)
     * @var integer
     */
    private $amount = 1;

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
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getPosition(): ?int
    {
        return $this->position;
    }

    /**
     * @param int $position
     */
    public function setPosition(int $position): void
    {
        $this->position = $position;
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
    public function getCategory(): ?string
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    /**
     * @return int
     */
    public function getUnit(): ?int
    {
        return $this->unit;
    }

    /**
     * @return string
     */
    public function getUnitText(): string
    {
        if (!array_key_exists($this->getUnit(), self::UNIT_TEXT)) {
            return '';
        }

        return self::UNIT_TEXT[$this->getUnit()];
    }

    /**
     * @param int $unit
     */
    public function setUnit(int $unit): void
    {
        $this->unit = $unit;
    }

    /**
     * @return int
     */
    public function getAmount(): ?int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
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
    public function getNetTotal(): int
    {
        return $this->getNet() * $this->getAmount();
    }

    /**
     * @return int
     */
    public function getTaxTotal(): int
    {
        return round($this->getNetTotal() * $this->getTaxPercent() / 100);
    }

    /**
     * @return int
     */
    public function getGrossTotal(): int
    {
        return $this->getNetTotal() + $this->getTaxTotal();
    }

    /**
     * @return Document
     */
    public function getDocument(): ?Document
    {
        return $this->document;
    }

    /**
     * @param Document $document
     */
    public function setDocument(Document $document): void
    {
        $this->document = $document;
    }
}
