<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 09/04/2017
 * Time: 15:16
 */

namespace ESPRITPIDEV\UserExpBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use DateTime;


/**
 * @ORM\Entity
 * @ORM\Table(name="todo")
 */

class ToDo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateTime", type="datetime", nullable=false)
     */
    private $datetime;
    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", length=65535, nullable=false)
     */
    private $content;
    /**
     * @var boolean
     *
     * @ORM\Column(name="done", type="boolean", nullable=false)
     */
    private $done;

    /**
     * ToDo constructor.
     * @param DateTime $datetime
     */
    public function __construct()
    {
        $this->datetime = new DateTime('now');
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return bool
     */
    public function isDone()
    {
        return $this->done;
    }

    /**
     * @param bool $done
     */
    public function setDone($done)
    {
        $this->done = $done;
    }



}