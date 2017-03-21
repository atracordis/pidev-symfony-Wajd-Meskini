<?php

namespace ESPRITPIDEV\UserExpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Compromisedpasswords
 *
 * @ORM\Table(name="compromisedpasswords")
 * @ORM\Entity
 */
class Compromisedpasswords
{
    /**
     * @var string
     *
     * @ORM\Column(name="pass", type="string", length=254, nullable=false)
     */
    private $pass;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set pass
     *
     * @param string $pass
     *
     * @return Compromisedpasswords
     */
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * Get pass
     *
     * @return string
     */
    public function getPass()
    {
        return $this->pass;
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
}
