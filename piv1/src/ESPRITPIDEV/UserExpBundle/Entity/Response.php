<?php
/**
 * Created by PhpStorm.
 * User: Deathscythvi
 * Date: 08/03/2017
 * Time: 22:07
 */

namespace ESPRITPIDEV\UserExpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;
/**
 * @ORM\Entity
 */

class Response
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue()
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", length=65535, nullable=false)
     */
    private $content;
    /**
     * @var boolean
     *
     * @ORM\Column(name="type", type="boolean", nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="dateTime", type="datetime", nullable=false)
     */
    private $datetime ;

    /**
     * @var \ESPRITPIDEV\UserExpBundle\Entity\Complaints
     *
     * @ORM\ManyToOne(targetEntity="Complaints")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcomplaint", referencedColumnName="id")
     * })
     */
    private $idcomplaint;

    public function __construct()
    {
        $this->datetime= new DateTime('now');
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
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * @param string $datetime
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;
    }


    /**
     * @return \ESPRITPIDEV\UserExpBundle\Entity\Complaints
     */
    public function getIdcomplaint()
    {
        return $this->idcomplaint;
    }

    /**
     * @param \ESPRITPIDEV\UserExpBundle\Entity\Complaints $idcomplaint
     */
    public function setIdcomplaint($idcomplaint)
    {
        $this->idcomplaint = $idcomplaint;
    }

    /**
     * @return bool
     */
    public function isType()
    {
        return $this->type;
    }

    /**
     * @param bool $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }



}
