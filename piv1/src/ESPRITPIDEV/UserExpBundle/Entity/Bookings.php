<?php

namespace ESPRITPIDEV\UserExpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bookings
 *
 * @ORM\Table(name="bookings", indexes={@ORM\Index(name="idRidePassenger", columns={"idRidePassenger"}), @ORM\Index(name="idRideDriver", columns={"idRideDriver"})})
 * @ORM\Entity
 */
class Bookings
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idRideDriver", type="integer", nullable=false)
     */
    private $idridedriver;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \ESPRITPIDEV\UserExpBundle\Entity\Ridepassenger
     *
     * @ORM\ManyToOne(targetEntity="ESPRITPIDEV\UserExpBundle\Entity\Ridepassenger")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idRidePassenger", referencedColumnName="id")
     * })
     */
    private $idridepassenger;



    /**
     * Set idridedriver
     *
     * @param integer $idridedriver
     *
     * @return Bookings
     */
    public function setIdridedriver($idridedriver)
    {
        $this->idridedriver = $idridedriver;

        return $this;
    }

    /**
     * Get idridedriver
     *
     * @return integer
     */
    public function getIdridedriver()
    {
        return $this->idridedriver;
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
     * Set idridepassenger
     *
     * @param \ESPRITPIDEV\UserExpBundle\Entity\Ridepassenger $idridepassenger
     *
     * @return Bookings
     */
    public function setIdridepassenger(\ESPRITPIDEV\UserExpBundle\Entity\Ridepassenger $idridepassenger = null)
    {
        $this->idridepassenger = $idridepassenger;

        return $this;
    }

    /**
     * Get idridepassenger
     *
     * @return \ESPRITPIDEV\UserExpBundle\Entity\Ridepassenger
     */
    public function getIdridepassenger()
    {
        return $this->idridepassenger;
    }
}
