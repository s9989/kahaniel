<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompanyRepository")
 */
class Company
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     * @var string
     */
    private $nip;

    /**
     * @ORM\Column(type="string", length=100)
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(name="first_name", type="string", length=50, nullable=true)
     * @var string
     */
    private $firstName;

    /**
     * @ORM\Column(name="last_name", type="string", length=100, nullable=true)
     * @var string
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=120, nullable=false)
     * @var string
     */
    private $street;

    /**
     * @ORM\Column(name="house_number", type="string", length=10, nullable=false)
     * @var string
     */
    private $houseNumber;

    /**
     * @ORM\Column(name="apartament_number", type="string", length=10, nullable=true)
     * @var string
     */
    private $apartamentNumber;

    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     * @var string
     */
    private $city;

    /**
     * @ORM\Column(name="post_code", type="string", length=10, nullable=false)
     * @var string
     */
    private $postCode;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @var string
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     * @var string
     */
    private $phone;

    /**
     * @var \DateTime
     * @ORM\Column(type="date", name="start_date", nullable=true)
     */
    private $startDate;

    /**
     * @var boolean
     */
    private $discount;

    /**
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    private $sicknessPayer;

    /**
     * @var User
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $owner;

    public function __construct()
    {
        $this->discount = false;
        $this->sicknessPayer = false;
    }

    public function __toString()
    {
        return $this->getName();
    }

    /**
     * @return mixed
     */
    public function getId(): ?int
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
     * @return string
     */
    public function getNip(): ?string
    {
        return $this->nip;
    }

    /**
     * @param string $nip
     */
    public function setNip(string $nip): void
    {
        $this->nip = $nip;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getAddressLine1()
    {
        return $this->getApartamentNumber()
            ? sprintf("%s %s m. %s", $this->getStreet(), $this->getHouseNumber(), $this->getApartamentNumber())
            : sprintf("%s %s", $this->getStreet(), $this->getHouseNumber());
    }

    /**
     * @return string
     */
    public function getAddressLine2()
    {
        return sprintf("%s %s", $this->getPostCode(), $this->getCity());
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return sprintf("%s, %s", $this->getAddressLine1(), $this->getAddressLine2());
    }

    /**
     * @return string
     */
    public function getStreet(): ?string
    {
        return $this->street;
    }

    /**
     * @param string $street
     */
    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    /**
     * @return string
     */
    public function getHouseNumber(): ?string
    {
        return $this->houseNumber;
    }

    /**
     * @param string $houseNumber
     */
    public function setHouseNumber(string $houseNumber): void
    {
        $this->houseNumber = $houseNumber;
    }

    /**
     * @return string
     */
    public function getApartamentNumber(): ?string
    {
        return $this->apartamentNumber;
    }

    /**
     * @param string $apartamentNumber
     */
    public function setApartamentNumber(string $apartamentNumber): void
    {
        $this->apartamentNumber = $apartamentNumber;
    }

    /**
     * @return string
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getPostCode(): ?string
    {
        return $this->postCode;
    }

    /**
     * @param string $postCode
     */
    public function setPostCode(string $postCode): void
    {
        $this->postCode = $postCode;
    }

    /**
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate(): ?\DateTime
    {
        return $this->startDate;
    }

    /**
     * @param \DateTime $startDate
     */
    public function setStartDate(?\DateTime $startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return bool
     */
    public function isDiscount(): bool
    {
        return $this->discount;
    }

    /**
     * @param bool $discount
     */
    public function setDiscount(bool $discount): void
    {
        $this->discount = $discount;
    }

    /**
     * @return User
     */
    public function getOwner(): User
    {
        return $this->owner;
    }

    /**
     * @param User $owner
     */
    public function setOwner(User $owner): void
    {
        $this->owner = $owner;
    }

    /**
     * @return bool
     */
    public function isSicknessPayer(): bool
    {
        return $this->sicknessPayer;
    }

    /**
     * @param bool $sicknessPayer
     */
    public function setSicknessPayer(bool $sicknessPayer): void
    {
        $this->sicknessPayer = $sicknessPayer;
    }
}
