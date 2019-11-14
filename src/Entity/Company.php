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

    public function __construct()
    {
        $this->main = false;
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
     * @return Company
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
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
     * @return Company
     */
    public function setNip(string $nip): Company
    {
        $this->nip = $nip;
        return $this;
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
     * @return Company
     */
    public function setName(string $name): Company
    {
        $this->name = $name;
        return $this;
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
     * @return Company
     */
    public function setFirstName(string $firstName): Company
    {
        $this->firstName = $firstName;
        return $this;
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
     * @return Company
     */
    public function setLastName(string $lastName): Company
    {
        $this->lastName = $lastName;
        return $this;
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
     * @return Company
     */
    public function setStreet(string $street): Company
    {
        $this->street = $street;
        return $this;
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
     * @return Company
     */
    public function setHouseNumber(string $houseNumber): Company
    {
        $this->houseNumber = $houseNumber;
        return $this;
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
     * @return Company
     */
    public function setApartamentNumber(string $apartamentNumber): Company
    {
        $this->apartamentNumber = $apartamentNumber;
        return $this;
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
     * @return Company
     */
    public function setCity(string $city): Company
    {
        $this->city = $city;
        return $this;
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
     * @return Company
     */
    public function setPostCode(string $postCode): Company
    {
        $this->postCode = $postCode;
        return $this;
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
     * @return Company
     */
    public function setEmail(string $email): Company
    {
        $this->email = $email;
        return $this;
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
     * @return Company
     */
    public function setPhone(string $phone): Company
    {
        $this->phone = $phone;
        return $this;
    }

}
