<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 18/03/2017
 * Time: 20:51
 */

namespace ESPRITPIDEV\UserExpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

/**
 * Warning
 *
 * @ORM\Table(name="Warning", indexes={@ORM\Index(name="iduser", columns={"iduser"})})
 * @ORM\Entity
 */

class Warning
{
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
     *   @ORM\JoinColumn(name="iduser", referencedColumnName="id")
     * })
     */
    private $iduser;

    /**
     * Warning constructor.
     * @param User $iduser
     */
    public function __construct(User $iduser)
    {
        $this->iduser = $iduser;
        $this->datetime=new DateTime('now');
    }

    /**
     * @return \DateTime
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * @param \DateTime $datetime
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;
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