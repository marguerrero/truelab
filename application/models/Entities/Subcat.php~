<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Subcat
 *
 * @ORM\Table(name="subcat")
 * @ORM\Entity
 */
class Subcat
{
    /**
     * @var integer $subTestId
     *
     * @ORM\Column(name="sub_test_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $subTestId;

    /**
     * @var string $subcateg
     *
     * @ORM\Column(name="subcateg", type="string", length=50, nullable=false)
     */
    private $subcateg;

    /**
     * @var integer $regPrice
     *
     * @ORM\Column(name="reg_price", type="integer", nullable=false)
     */
    private $regPrice;

    /**
     * @var integer $discPrice
     *
     * @ORM\Column(name="disc_price", type="integer", nullable=false)
     */
    private $discPrice;

    /**
     * @var CategMain
     *
     * @ORM\ManyToOne(targetEntity="CategMain")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="main_test_id", referencedColumnName="main_test_id")
     * })
     */
    private $mainTest;


    /**
     * Get subTestId
     *
     * @return integer 
     */
    public function getSubTestId()
    {
        return $this->subTestId;
    }

    /**
     * Set subcateg
     *
     * @param string $subcateg
     * @return Subcat
     */
    public function setSubcateg($subcateg)
    {
        $this->subcateg = $subcateg;
        return $this;
    }

    /**
     * Get subcateg
     *
     * @return string 
     */
    public function getSubcateg()
    {
        return $this->subcateg;
    }

    /**
     * Set regPrice
     *
     * @param integer $regPrice
     * @return Subcat
     */
    public function setRegPrice($regPrice)
    {
        $this->regPrice = $regPrice;
        return $this;
    }

    /**
     * Get regPrice
     *
     * @return integer 
     */
    public function getRegPrice()
    {
        return $this->regPrice;
    }

    /**
     * Set discPrice
     *
     * @param integer $discPrice
     * @return Subcat
     */
    public function setDiscPrice($discPrice)
    {
        $this->discPrice = $discPrice;
        return $this;
    }

    /**
     * Get discPrice
     *
     * @return integer 
     */
    public function getDiscPrice()
    {
        return $this->discPrice;
    }

    /**
     * Set mainTest
     *
     * @param CategMain $mainTest
     * @return Subcat
     */
    public function setMainTest(\CategMain $mainTest = null)
    {
        $this->mainTest = $mainTest;
        return $this;
    }

    /**
     * Get mainTest
     *
     * @return CategMain 
     */
    public function getMainTest()
    {
        return $this->mainTest;
    }
}