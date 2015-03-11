<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * CustomerTransaction
 *
 * @ORM\Table(name="customer_transaction")
 * @ORM\Entity
 */
class CustomerTransaction
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
     * @var string $receiptNo
     *
     * @ORM\Column(name="receipt_no", type="string", length=100, nullable=true)
     */
    private $receiptNo;

    /**
     * @var datetime $transdate
     *
     * @ORM\Column(name="transdate", type="datetime", nullable=false)
     */
    private $transdate;

    /**
     * @var string $createdBy
     *
     * @ORM\Column(name="created_by", type="string", length=100, nullable=true)
     */
    private $createdBy;

    /**
     * @var integer $custId
     *
     * @ORM\Column(name="cust_id", type="integer", nullable=true)
     */
    private $custId;


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
     * Set receiptNo
     *
     * @param string $receiptNo
     * @return CustomerTransaction
     */
    public function setReceiptNo($receiptNo)
    {
        $this->receiptNo = $receiptNo;
        return $this;
    }

    /**
     * Get receiptNo
     *
     * @return string 
     */
    public function getReceiptNo()
    {
        return $this->receiptNo;
    }

    /**
     * Set transdate
     *
     * @param datetime $transdate
     * @return CustomerTransaction
     */
    public function setTransdate($transdate)
    {
        $this->transdate = $transdate;
        return $this;
    }

    /**
     * Get transdate
     *
     * @return datetime 
     */
    public function getTransdate()
    {
        return $this->transdate;
    }

    /**
     * Set createdBy
     *
     * @param string $createdBy
     * @return CustomerTransaction
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
        return $this;
    }

    /**
     * Get createdBy
     *
     * @return string 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set custId
     *
     * @param integer $custId
     * @return CustomerTransaction
     */
    public function setCustId($custId)
    {
        $this->custId = $custId;
        return $this;
    }

    /**
     * Get custId
     *
     * @return integer 
     */
    public function getCustId()
    {
        return $this->custId;
    }
}