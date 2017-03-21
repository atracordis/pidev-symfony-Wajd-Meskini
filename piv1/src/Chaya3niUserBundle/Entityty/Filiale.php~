<?php

namespace Chaya3niUserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Filiale
 *
 * @ORM\Table(name="filiale", indexes={@ORM\Index(name="idCompany", columns={"idCompany"})})
 * @ORM\Entity
 */
class Filiale
{
    /**
     * @var string
     *
     * @ORM\Column(name="address1", type="string", length=50, nullable=false)
     */
    private $address1;

    /**
     * @var string
     *
     * @ORM\Column(name="address2", type="string", length=50, nullable=false)
     */
    private $address2;

    /**
     * @var integer
     *
     * @ORM\Column(name="codePostal", type="integer", nullable=false)
     */
    private $codepostal;

    /**
     * @var integer
     *
     * @ORM\Column(name="latitude", type="integer", nullable=false)
     */
    private $latitude;

    /**
     * @var integer
     *
     * @ORM\Column(name="longitude", type="integer", nullable=false)
     */
    private $longitude;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Chaya3niUserBundle\Entity\Company
     *
     * @ORM\ManyToOne(targetEntity="Chaya3niUserBundle\Entity\Company")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCompany", referencedColumnName="id")
     * })
     */
    private $idcompany;


}

