<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * CustomerService
 *
 * @ORM\Table(name="customer_service")
 * @ORM\Entity
 */
class CustomerService
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer $subcatId
     *
     * @ORM\Column(name="subcat_id", type="integer", nullable=true)
     */
    private $subcatId;

    /**
     * @var boolean $hasDiscount
     *
     * @ORM\Column(name="has_discount", type="boolean", nullable=true)
     */
    private $hasDiscount;

    /**
     * @var string $amount
     *
     * @ORM\Column(name="amount", type="string", length=20, nullable=true)
     */
    private $amount;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set subcatId
     *
     * @param integer $subcatId
     * @return CustomerService
     */
    public function setSubcatId($subcatId)
    {
        $this->subcatId = $subcatId;
        return $this;
    }

    /**
     * Get subcatId
     *
     * @return integer 
     */
    public function getSubcatId()
    {
        return $this->subcatId;
    }

    /**
     * Set hasDiscount
     *
     * @param boolean $hasDiscount
     * @return CustomerService
     */
    public function setHasDiscount($hasDiscount)
    {
        $this->hasDiscount = $hasDiscount;
        return $this;
    }

    /**
     * Get hasDiscount
     *
     * @return boolean 
     */
    public function getHasDiscount()
    {
        return $this->hasDiscount;
    }

    /**
     * Set amount
     *
     * @param string $amount
     * @return CustomerService
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Get amount
     *
     * @return string 
     */
    public function getAmount()
    {
        return $this->amount;
    }
}