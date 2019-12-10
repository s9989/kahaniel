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
     * @ORM\Column(type="integer", nullable=false)
     * @var integer
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
    public function getPosition(): int
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
    public function getTitle(): string
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
     * @return int
     */
    public function getCategory(): int
    {
        return $this->category;
    }

    /**
     * @param int $category
     */
    public function setCategory(int $category): void
    {
        $this->category = $category;
    }

    /**
     * @return int
     */
    public function getUnit(): int
    {
        return $this->unit;
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
    public function getAmount(): int
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
    public function getNet(): int
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
    public function getTaxPercent(): int
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
     * @return Document
     */
    public function getDocument(): Document
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
