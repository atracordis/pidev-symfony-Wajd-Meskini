<?php

namespace ESPRITPIDEV\UserExpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Messages
 *
 * @ORM\Table(name="messages", indexes={@ORM\Index(name="idSource", columns={"idSource", "idDestination"}), @ORM\Index(name="idDestination", columns={"idDestination"}), @ORM\Index(name="IDX_DB021E963C9BD7E9", columns={"idSource"})})
 * @ORM\Entity
 */
class Messages
{
    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", length=65535, nullable=false)
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
     * @var \ESPRITPIDEV\UserExpBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="ESPRITPIDEV\UserExpBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idSource", referencedColumnName="id")
     * })
     */
    private $idsource;

    /**
     * @var \ESPRITPIDEV\UserExpBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="ESPRITPIDEV\UserExpBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idDestination", referencedColumnName="id")
     * })
     */
    private $iddestination;



    /**
     * Set content
     *
     * @param string $content
     *
     * @return Messages
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
     * @return Messages
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
     * Set idsource
     *
     * @param \ESPRITPIDEV\UserExpBundle\Entity\User $idsource
     *
     * @return Messages
     */
    public function setIdsource(\ESPRITPIDEV\UserExpBundle\Entity\User $idsource = null)
    {
        $this->idsource = $idsource;

        return $this;
    }

    /**
     * Get idsource
     *
     * @return \ESPRITPIDEV\UserExpBundle\Entity\User
     */
    public function getIdsource()
    {
        return $this->idsource;
    }

    /**
     * Set iddestination
     *
     * @param \ESPRITPIDEV\UserExpBundle\Entity\User $iddestination
     *
     * @return Messages
     */
    public function setIddestination(\ESPRITPIDEV\UserExpBundle\Entity\User $iddestination = null)
    {
        $this->iddestination = $iddestination;

        return $this;
    }

    /**
     * Get iddestination
     *
     * @return \ESPRITPIDEV\UserExpBundle\Entity\User
     */
    public function getIddestination()
    {
        return $this->iddestination;
    }
}
