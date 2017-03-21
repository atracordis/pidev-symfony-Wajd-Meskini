<?php

namespace Chaya3niUserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Preferences
 *
 * @ORM\Table(name="preferences", indexes={@ORM\Index(name="idUser", columns={"idUser"})})
 * @ORM\Entity
 */
class Preferences
{
    /**
     * @var boolean
     *
     * @ORM\Column(name="email", type="boolean", nullable=false)
     */
    private $email;

    /**
     * @var boolean
     *
     * @ORM\Column(name="telephone", type="boolean", nullable=false)
     */
    private $telephone;

    /**
     * @var boolean
     *
     * @ORM\Column(name="address", type="boolean", nullable=false)
     */
    private $address;

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
     * @var boolean
     *
     * @ORM\Column(name="music", type="boolean", nullable=false)
     */
    private $music;

    /**
     * @var string
     *
     * @ORM\Column(name="musicTaste", type="string", length=50, nullable=false)
     */
    private $musictaste;

    /**
     * @var boolean
     *
     * @ORM\Column(name="smoking", type="boolean", nullable=false)
     */
    private $smoking;

    /**
     * @var boolean
     *
     * @ORM\Column(name="allowSmoking", type="boolean", nullable=false)
     */
    private $allowsmoking;

    /**
     * @var boolean
     *
     * @ORM\Column(name="animal", type="boolean", nullable=false)
     */
    private $animal;

    /**
     * @var boolean
     *
     * @ORM\Column(name="haveAnimal", type="boolean", nullable=false)
     */
    private $haveanimal;

    /**
     * @var string
     *
     * @ORM\Column(name="confortVoiture", type="string", length=50, nullable=true)
     */
    private $confortvoiture;

    /**
     * @var string
     *
     * @ORM\Column(name="modeleVoiture", type="string", length=50, nullable=true)
     */
    private $modelevoiture;

    /**
     * @var string
     *
     * @ORM\Column(name="marqueVoiture", type="string", length=50, nullable=true)
     */
    private $marquevoiture;

    /**
     * @var \Chaya3niUserBundle\Entity\User
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Chaya3niUserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUser", referencedColumnName="id")
     * })
     */
    private $iduser;


}

