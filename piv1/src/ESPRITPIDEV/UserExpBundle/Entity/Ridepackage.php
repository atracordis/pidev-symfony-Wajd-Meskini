<?php

namespace ESPRITPIDEV\UserExpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ridepackage
 *
 * @ORM\Table(name="ridepackage", indexes={@ORM\Index(name="id", columns={"idtrajet"}), @ORM\Index(name="id_2", columns={"idtrajet"})})
 * @ORM\Entity
 */
class Ridepackage
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_package", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPackage;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="size", type="string", length=20, nullable=false)
     */
    private $size;

    /**
     * @var string
     *
     * @ORM\Column(name="typePackage", type="string", length=20, nullable=false)
     */
    private $typepackage;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer", nullable=false)
     */
    private $quantity;

    /**
     * @var float
     *
     * @ORM\Column(name="poids", type="float", precision=10, scale=0, nullable=false)
     */
    private $poids;

    /**
     * @var integer
     *
     * @ORM\Column(name="prix", type="integer", nullable=false)
     */
    private $prix;

    /**
     * @var \Ridepassenger
     *
     * @ORM\ManyToOne(targetEntity="Ridepassenger")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idtrajet", referencedColumnName="id")
     * })
     */
    private $idtrajet;


}

