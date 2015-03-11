<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * CategMain
 *
 * @ORM\Table(name="categ_main")
 * @ORM\Entity
 */
class CategMain
{
    /**
     * @var integer $mainTestId
     *
     * @ORM\Column(name="main_test_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $mainTestId;

    /**
     * @var string $category
     *
     * @ORM\Column(name="category", type="string", length=50, nullable=false)
     */
    private $category;


    /**
     * Get mainTestId
     *
     * @return integer 
     */
    public function getMainTestId()
    {
        return $this->mainTestId;
    }

    /**
     * Set category
     *
     * @param string $category
     * @return CategMain
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * Get category
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->category;
    }
}