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



    /**
     * Set email
     *
     * @param boolean $email
     *
     * @return Preferences
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return boolean
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telephone
     *
     * @param boolean $telephone
     *
     * @return Preferences
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return boolean
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set address
     *
     * @param boolean $address
     *
     * @return Preferences
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return boolean
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set latitude
     *
     * @param integer $latitude
     *
     * @return Preferences
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return integer
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param integer $longitude
     *
     * @return Preferences
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return integer
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set music
     *
     * @param boolean $music
     *
     * @return Preferences
     */
    public function setMusic($music)
    {
        $this->music = $music;

        return $this;
    }

    /**
     * Get music
     *
     * @return boolean
     */
    public function getMusic()
    {
        return $this->music;
    }

    /**
     * Set musictaste
     *
     * @param string $musictaste
     *
     * @return Preferences
     */
    public function setMusictaste($musictaste)
    {
        $this->musictaste = $musictaste;

        return $this;
    }

    /**
     * Get musictaste
     *
     * @return string
     */
    public function getMusictaste()
    {
        return $this->musictaste;
    }

    /**
     * Set smoking
     *
     * @param boolean $smoking
     *
     * @return Preferences
     */
    public function setSmoking($smoking)
    {
        $this->smoking = $smoking;

        return $this;
    }

    /**
     * Get smoking
     *
     * @return boolean
     */
    public function getSmoking()
    {
        return $this->smoking;
    }

    /**
     * Set allowsmoking
     *
     * @param boolean $allowsmoking
     *
     * @return Preferences
     */
    public function setAllowsmoking($allowsmoking)
    {
        $this->allowsmoking = $allowsmoking;

        return $this;
    }

    /**
     * Get allowsmoking
     *
     * @return boolean
     */
    public function getAllowsmoking()
    {
        return $this->allowsmoking;
    }

    /**
     * Set animal
     *
     * @param boolean $animal
     *
     * @return Preferences
     */
    public function setAnimal($animal)
    {
        $this->animal = $animal;

        return $this;
    }

    /**
     * Get animal
     *
     * @return boolean
     */
    public function getAnimal()
    {
        return $this->animal;
    }

    /**
     * Set haveanimal
     *
     * @param boolean $haveanimal
     *
     * @return Preferences
     */
    public function setHaveanimal($haveanimal)
    {
        $this->haveanimal = $haveanimal;

        return $this;
    }

    /**
     * Get haveanimal
     *
     * @return boolean
     */
    public function getHaveanimal()
    {
        return $this->haveanimal;
    }

    /**
     * Set confortvoiture
     *
     * @param string $confortvoiture
     *
     * @return Preferences
     */
    public function setConfortvoiture($confortvoiture)
    {
        $this->confortvoiture = $confortvoiture;

        return $this;
    }

    /**
     * Get confortvoiture
     *
     * @return string
     */
    public function getConfortvoiture()
    {
        return $this->confortvoiture;
    }

    /**
     * Set modelevoiture
     *
     * @param string $modelevoiture
     *
     * @return Preferences
     */
    public function setModelevoiture($modelevoiture)
    {
        $this->modelevoiture = $modelevoiture;

        return $this;
    }

    /**
     * Get modelevoiture
     *
     * @return string
     */
    public function getModelevoiture()
    {
        return $this->modelevoiture;
    }

    /**
     * Set marquevoiture
     *
     * @param string $marquevoiture
     *
     * @return Preferences
     */
    public function setMarquevoiture($marquevoiture)
    {
        $this->marquevoiture = $marquevoiture;

        return $this;
    }

    /**
     * Get marquevoiture
     *
     * @return string
     */
    public function getMarquevoiture()
    {
        return $this->marquevoiture;
    }

    /**
     * Set iduser
     *
     * @param \Chaya3niUserBundle\Entity\User $iduser
     *
     * @return Preferences
     */
    public function setIduser(\Chaya3niUserBundle\Entity\User $iduser)
    {
        $this->iduser = $iduser;

        return $this;
    }

    /**
     * Get iduser
     *
     * @return \Chaya3niUserBundle\Entity\User
     */
    public function getIduser()
    {
        return $this->iduser;
    }
}
