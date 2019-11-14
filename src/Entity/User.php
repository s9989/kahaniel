<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Table(name="app_users")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @var string
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=25, unique=true)
     */
    private $username;

    /**
     * @var string
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    /**
     * @var string
     * @ORM\Column(type="string", length=254, unique=true)
     */
    private $email;

    /**
     * @var \DateTime
     * @ORM\Column(type="date", name="start_date", nullable=true)
     */
    private $startDate;

    /**
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    private $discount;

    /**
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    private $sicknessPayer;

    /**
     * @var Company
     * @ORM\OneToOne(targetEntity="Company")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     */
    private $company;

    /**
     * @var boolean
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    public function __construct()
    {
        $this->isActive = true;
        $this->discount = false;
        // may not be needed, see section on salt below
        // $this->salt = md5(uniqid('', true));
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function eraseCredentials()
    {
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
            ) = unserialize($serialized, ['allowed_classes' => false]);
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return User
     */
    public function setId(string $id): User
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
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
     * @return User
     */
    public function setStartDate(?\DateTime $startDate): User
    {
        $this->startDate = $startDate;
        return $this;
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
     * @return User
     */
    public function setDiscount(bool $discount): User
    {
        $this->discount = $discount;
        return $this;
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
     * @return User
     */
    public function setCompany(Company $company): User
    {
        $this->company = $company;
        return $this;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->isActive;
    }

    /**
     * @param bool $isActive
     * @return User
     */
    public function setIsActive(bool $isActive): User
    {
        $this->isActive = $isActive;
        return $this;
    }

    /**
     * @param string $username
     * @return User
     */
    public function setUsername(string $username): User
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
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
     * @return User
     */
    public function setSicknessPayer(bool $sicknessPayer): User
    {
        $this->sicknessPayer = $sicknessPayer;
        return $this;
    }
}