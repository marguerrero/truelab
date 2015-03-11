<?php


namespace Entities;
use Doctrine\ORM\Mapping as ORM;

/**
 * CustList
 *
 * @ORM\Table(name="cust_list")
 * @ORM\Entity
 */
class CustList
{
    /**
     * @var integer $serviceId
     *
     * @ORM\Column(name="service_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $serviceId;

    /**
     * @var string $firstname
     *
     * @ORM\Column(name="firstname", type="string", length=30, nullable=false)
     */
    private $firstname;

    /**
     * @var string $lastname
     *
     * @ORM\Column(name="lastname", type="string", length=30, nullable=false)
     */
    private $lastname;

    /**
     * @var integer $age
     *
     * @ORM\Column(name="age", type="integer", nullable=false)
     */
    private $age;

    /**
     * @var string $sex
     *
     * @ORM\Column(name="sex", type="string", length=10, nullable=false)
     */
    private $sex;

    /**
     * @var date $bday
     *
     * @ORM\Column(name="bday", type="date", nullable=false)
     */
    private $bday;


    /**
     * Get serviceId
     *
     * @return integer 
     */
    public function getServiceId()
    {
        return $this->serviceId;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return CustList
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return CustList
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set age
     *
     * @param integer $age
     * @return CustList
     */
    public function setAge($age)
    {
        $this->age = $age;
        return $this;
    }

    /**
     * Get age
     *
     * @return integer 
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set sex
     *
     * @param string $sex
     * @return CustList
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
        return $this;
    }

    /**
     * Get sex
     *
     * @return string 
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set bday
     *
     * @param date $bday
     * @return CustList
     */
    public function setBday($bday)
    {
        $this->bday = $bday;
        return $this;
    }

    /**
     * Get bday
     *
     * @return date 
     */
    public function getBday()
    {
        return $this->bday;
    }
}