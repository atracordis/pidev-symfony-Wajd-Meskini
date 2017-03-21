<?php

namespace Chaya3niUserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reviews
 *
 * @ORM\Table(name="reviews", indexes={@ORM\Index(name="idBooking", columns={"idBooking"}), @ORM\Index(name="idUser", columns={"idUser"}), @ORM\Index(name="idUser2", columns={"idUser2"})})
 * @ORM\Entity
 */
class Reviews
{
    /**
     * @var integer
     *
     * @ORM\Column(name="rating", type="integer", nullable=true)
     */
    private $rating;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=25, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=254, nullable=false)
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateTime", type="datetime", nullable=false)
     */
    private $datetime;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Chaya3niUserBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Chaya3niUserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUser2", referencedColumnName="id")
     * })
     */
    private $iduser2;

    /**
     * @var \Chaya3niUserBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Chaya3niUserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUser", referencedColumnName="id")
     * })
     */
    private $iduser;

    /**
     * @var \Chaya3niUserBundle\Entity\Bookings
     *
     * @ORM\ManyToOne(targetEntity="Chaya3niUserBundle\Entity\Bookings")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idBooking", referencedColumnName="id")
     * })
     */
    private $idbooking;



    /**
     * Set rating
     *
     * @param integer $rating
     *
     * @return Reviews
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return integer
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Reviews
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Reviews
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set datetime
     *
     * @param \DateTime $datetime
     *
     * @return Reviews
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Get datetime
     *
     * @return \DateTime
     */
    public function getDatetime()
    {
        return $this->datetime;
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
     * Set iduser2
     *
     * @param \Chaya3niUserBundle\Entity\User $iduser2
     *
     * @return Reviews
     */
    public function setIduser2(\Chaya3niUserBundle\Entity\User $iduser2 = null)
    {
        $this->iduser2 = $iduser2;

        return $this;
    }

    /**
     * Get iduser2
     *
     * @return \Chaya3niUserBundle\Entity\User
     */
    public function getIduser2()
    {
        return $this->iduser2;
    }

    /**
     * Set iduser
     *
     * @param \Chaya3niUserBundle\Entity\User $iduser
     *
     * @return Reviews
     */
    public function setIduser(\Chaya3niUserBundle\Entity\User $iduser = null)
    {
        $this->iduser = $iduser;

        return $this;
    }

    /**
     * Get iduser
     *
     * @return \Chaya3niUserBundle\Entity\User
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * Set idbooking
     *
     * @param \Chaya3niUserBundle\Entity\Bookings $idbooking
     *
     * @return Reviews
     */
    public function setIdbooking(\Chaya3niUserBundle\Entity\Bookings $idbooking = null)
    {
        $this->idbooking = $idbooking;

        return $this;
    }

    /**
     * Get idbooking
     *
     * @return \Chaya3niUserBundle\Entity\Bookings
     */
    public function getIdbooking()
    {
        return $this->idbooking;
    }
}
