<?php

namespace ESPRITPIDEV\UserExpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;
use ESPRITPIDEV\UserExpBundle\Repository\ComplaintsRepository;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Complaints
 *
 * @ORM\Table(name="complaints", indexes={@ORM\Index(name="iduser", columns={"iduser"})})
 * @ORM\Entity
 */
class Complaints
{
    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", length=65535, nullable=false)
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=254, nullable=false)
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateTime", type="datetime", nullable=false)
     */
    private $datetime;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $attachment;


    /**
     * @var string
     *
     * @ORM\Column(name="Status", type="string", length=20, nullable=false)
     */
    private $status ;

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
     *   @ORM\JoinColumn(name="iduser", referencedColumnName="id")
     * })
     */
    private $iduser;


    private $file;
    public function __construct()
    {
        $this->datetime= new DateTime('now');
        $this->status = 'Unseen';
        $this->attachment = ' ';
    }




    /**
     * Set content
     *
     * @param string $content
     *
     * @return Complaints
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Set Id
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Set type
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Complaints
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set datetime
     *
     * @param \DateTime $datetime
     *
     * @return Complaints
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

    public function setAttachment($attachment)
    {
        $this->attachment = $attachment;

        return $this;
    }

    public function getAttachment()
    {
        return $this->attachment;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Complaints
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
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
     * Set iduser
     *
     * @param \ESPRITPIDEV\UserExpBundle\Entity\User $iduser
     *
     * @return Complaints
     */
    public function setIduser(\ESPRITPIDEV\UserExpBundle\Entity\User $iduser = null)
    {
        $this->iduser = $iduser;

        return $this;
    }

    /**
     * Get iduser
     *
     * @return \ESPRITPIDEV\UserExpBundle\Entity\User
     */
    public function getIduser()
    {
        return $this->iduser;
    }
}
