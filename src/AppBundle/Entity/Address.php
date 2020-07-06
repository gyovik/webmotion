<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Address
 *
 * @ORM\Table(name="address")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AddressRepository")
 */
class Address
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_type", type="string", length=20)
     * @Assert\NotBlank(message="A mező kitöltése kötelező")
     */
    private $customerType;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank(message="A mező kitöltése kötelező")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string", nullable=true)
     * @Assert\Regex("/^\s*(?:\+?(\d{1,2}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/", message="Kérlek valós telefonszámot adj meg!")
     */
    private $phoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="tax_number", type="string", nullable=true)
     * @Assert\Regex("/^\s*(\d{8})[-. (]*(\d{1})[-. )]*(\d{2})\s*$/", message="Kérlek valós adószámot adj meg!")
     */
    private $taxNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=90)
     * @Assert\NotBlank(message="A mező kitöltése kötelező")
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="post_code", type="string", length=6)
     * @Assert\NotBlank(message="A mező kitöltése kötelező")
     * @Assert\Regex("/^\s*(\d{4})\s*$/", message="Kérlek valós Irányítószámot adj meg!")
     */
    private $postCode;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=90)
     * @Assert\NotBlank(message="A mező kitöltése kötelező")
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=255)
     * @Assert\NotBlank(message="A mező kitöltése kötelező")
     */
    private $street;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set customerType
     *
     * @param string $customerType
     *
     * @return Address
     */
    public function setCustomerType($customerType)
    {
        $this->customerType = $customerType;

        return $this;
    }

    /**
     * Get customerType
     *
     * @return string
     */
    public function getCustomerType()
    {
        return $this->customerType;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Address
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     *
     * @return Address
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set taxNumber
     *
     * @param string $taxNumber
     *
     * @return Address
     */
    public function setTaxNumber($taxNumber)
    {
        $this->taxNumber = $taxNumber;

        return $this;
    }

    /**
     * Get taxNumber
     *
     * @return sring
     */
    public function getTaxNumber()
    {
        return $this->taxNumber;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Address
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set postCode
     *
     * @param string $postCode
     *
     * @return Address
     */
    public function setPostCode($postCode)
    {
        $this->postCode = $postCode;

        return $this;
    }

    /**
     * Get postCode
     *
     * @return string
     */
    public function getPostCode()
    {
        return $this->postCode;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Address
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set street
     *
     * @param string $street
     *
     * @return Address
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }
}

