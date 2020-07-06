<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ItemOrder
 *
 * @ORM\Table(name="item_order")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ItemOrderRepository")
 */
class ItemOrder
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
     * @Assert\NotBlank(message="A mező kitöltése kötelezo")
     */
    private $customerType;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank(message="A mező kitöltése kötelezo")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="A mező kitöltése kötelezo")
     * @Assert\Regex("/^\s*(?:\+?(\d{1,2}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/", message="Kérlek valós telefonszámot adj meg!")
     */
    private $phoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="tax_number", type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="A mező kitöltése kötelezo")
     * @Assert\Regex("/^\s*(\d{8})[-. (]*(\d{1})[-. )]*(\d{2})\s*$/", message="Kérlek valós adószámot adj meg!")
     */
    private $taxNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255)
     * @Assert\NotBlank(message="A mező kitöltése kötelezo")
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="post_code", type="string", length=6)
     * @Assert\NotBlank(message="A mező kitöltése kötelezo")
     * @Assert\Regex("/^\s*(\d{4})\s*$/", message="Kérlek valós Irányítószámot adj meg!")
     */
    private $postCode;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     * @Assert\NotBlank(message="A mező kitöltése kötelezo")
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=255)
     * @Assert\NotBlank(message="A mező kitöltése kötelezo")
     */
    private $street;

    /**
     * @var float
     *
     * @ORM\Column(name="price_wo_tax", type="float")
     */
    private $priceWoTax;

    /**
     * @var float
     *
     * @ORM\Column(name="tax", type="float")
     */
    private $tax;

    /**
     * @var float
     *
     * @ORM\Column(name="full_price", type="float")
     */
    private $fullPrice;

    /**
     * @var int
     *
     * @ORM\Column(name="order_number", type="integer")
     */
    private $orderNumber;


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
     * @return ItemOrder
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
     * @return ItemOrder
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
     * @return ItemOrder
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
     * @return ItemOrder
     */
    public function setTaxNumber($taxNumber)
    {
        $this->taxNumber = $taxNumber;

        return $this;
    }

    /**
     * Get taxNumber
     *
     * @return string
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
     * @return ItemOrder
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
     * @return ItemOrder
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
     * @return ItemOrder
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
     * @return ItemOrder
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

    /**
     * Set priceWoTax
     *
     * @param float $priceWoTax
     *
     * @return ItemOrder
     */
    public function setPriceWoTax($priceWoTax)
    {
        $this->priceWoTax = $priceWoTax;

        return $this;
    }

    /**
     * Get priceWoTax
     *
     * @return float
     */
    public function getPriceWoTax()
    {
        return $this->priceWoTax;
    }

    /**
     * Set tax
     *
     * @param float $tax
     *
     * @return ItemOrder
     */
    public function setTax($tax)
    {
        $this->tax = $tax;

        return $this;
    }

    /**
     * Get tax
     *
     * @return float
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Set fullPrice
     *
     * @param float $fullPrice
     *
     * @return ItemOrder
     */
    public function setFullPrice($fullPrice)
    {
        $this->fullPrice = $fullPrice;

        return $this;
    }

    /**
     * Get fullPrice
     *
     * @return float
     */
    public function getFullPrice()
    {
        return $this->fullPrice;
    }

    /**
     * Set orderNumber
     *
     * @param integer $orderNumber
     *
     * @return ItemOrder
     */
    public function setOrderNumber($orderNumber)
    {
        $this->orderNumber = $orderNumber;

        return $this;
    }

    /**
     * Get orderNumber
     *
     * @return int
     */
    public function getOrderNumber()
    {
        return $this->orderNumber;
    }
}

