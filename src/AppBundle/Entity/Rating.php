<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rating
 */
class Rating
{
    /**
     * @var boolean
     */
    private $good;

    /**
     * @var \DateTime
     */
    private $dateCreated;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Comment
     */
    private $comment;


    /**
     * Set good
     *
     * @param boolean $good
     * @return Rating
     */
    public function setGood($good)
    {
        $this->good = $good;

        return $this;
    }

    /**
     * Get good
     *
     * @return boolean 
     */
    public function getGood()
    {
        return $this->good;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return Rating
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime 
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
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
     * Set comment
     *
     * @param \AppBundle\Entity\Comment $comment
     * @return Rating
     */
    public function setComment(\AppBundle\Entity\Comment $comment = null)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return \AppBundle\Entity\Comment 
     */
    public function getComment()
    {
        return $this->comment;
    }
}
