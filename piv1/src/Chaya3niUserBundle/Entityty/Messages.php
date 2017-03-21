<?php

namespace Chaya3niUserBundle\Entity;

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
     * @var \Chaya3niUserBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Chaya3niUserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idSource", referencedColumnName="id")
     * })
     */
    private $idsource;

    /**
     * @var \Chaya3niUserBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Chaya3niUserBundle\Entity\User")
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
     * @param \Chaya3niUserBundle\Entity\User $idsource
     *
     * @return Messages
     */
    public function setIdsource(\Chaya3niUserBundle\Entity\User $idsource = null)
    {
        $this->idsource = $idsource;

        return $this;
    }

    /**
     * Get idsource
     *
     * @return \Chaya3niUserBundle\Entity\User
     */
    public function getIdsource()
    {
        return $this->idsource;
    }

    /**
     * Set iddestination
     *
     * @param \Chaya3niUserBundle\Entity\User $iddestination
     *
     * @return Messages
     */
    public function setIddestination(\Chaya3niUserBundle\Entity\User $iddestination = null)
    {
        $this->iddestination = $iddestination;

        return $this;
    }

    /**
     * Get iddestination
     *
     * @return \Chaya3niUserBundle\Entity\User
     */
    public function getIddestination()
    {
        return $this->iddestination;
    }
}
