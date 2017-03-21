<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 15/03/2017
 * Time: 19:18
 */

namespace ESPRITPIDEV\UserExpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

/**
 * Notification
 *
 * @ORM\Table(name="Notification", indexes={@ORM\Index(name="iduser", columns={"iduser"})})
 * @ORM\Entity
 */
class Notification
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

    /**
     * Notification constructor.
     * @param string $content
     * @param string $type
     * @param DateTime $datetime
     * @param string $status
     * @param int $id
     * @param User $iduser
     */
    public function __construct($content, $type, $status, User $iduser)
    {
        $this->content = $content;
        $this->type = $type;
        $this->datetime= new DateTime('now');
        $this->status = $status;
        $this->iduser = $iduser;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return DateTime
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * @param DateTime $datetime
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return User
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * @param User $iduser
     */
    public function setIduser($iduser)
    {
        $this->iduser = $iduser;
    }



}