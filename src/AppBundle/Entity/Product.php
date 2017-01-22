<?php
/**
 * Created by PhpStorm.
 * User: stijn
 * Date: 21-1-2017
 * Time: 21:44
 */

namespace AppBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="products")
 * @ORM\Entity()
 */
class Product
{
    public function __construct()
    {
        $this->created_at = new DateTime();
        $this->updated_at = new DateTime();
    }
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column(type="string")
     */
    private $name;
    /**
     * @ORM\Column(type="string")
     */
    private $buyname;
    /**
     * @ORM\Column(type="integer")
     */
    private $buyqty;
    /**
     * @ORM\Column(type="string")
     */
    private $sellname;
    /**
     * @ORM\Column(type="integer")
     */
    private $sellqty;
    /**
     * @ORM\Column(type="string")
     */
    private $category;
    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;
    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

  
    /**
     * Set name
     *
     * @param string $name
     *
     * @return Product
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
     * Set category
     *
     * @param string $category
     *
     * @return Product
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

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Product
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Product
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

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
     * Set buyname
     *
     * @param string $buyname
     *
     * @return Product
     */
    public function setBuyname($buyname)
    {
        $this->buyname = $buyname;

        return $this;
    }

    /**
     * Get buyname
     *
     * @return string
     */
    public function getBuyname()
    {
        return $this->buyname;
    }

    /**
     * Set buyqty
     *
     * @param integer $buyqty
     *
     * @return Product
     */
    public function setBuyqty($buyqty)
    {
        $this->buyqty = $buyqty;

        return $this;
    }

    /**
     * Get buyqty
     *
     * @return integer
     */
    public function getBuyqty()
    {
        return $this->buyqty;
    }

    /**
     * Set sellname
     *
     * @param string $sellname
     *
     * @return Product
     */
    public function setSellname($sellname)
    {
        $this->sellname = $sellname;

        return $this;
    }

    /**
     * Get sellname
     *
     * @return string
     */
    public function getSellname()
    {
        return $this->sellname;
    }

    /**
     * Set sellqty
     *
     * @param integer $sellqty
     *
     * @return Product
     */
    public function setSellqty($sellqty)
    {
        $this->sellqty = $sellqty;

        return $this;
    }

    /**
     * Get sellqty
     *
     * @return integer
     */
    public function getSellqty()
    {
        return $this->sellqty;
    }
}
