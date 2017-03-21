<?php

namespace ESPRITPIDEV\UserExpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ridedriver
 *
 * @ORM\Table(name="ridedriver", indexes={@ORM\Index(name="idPassenger", columns={"idDriver"}), @ORM\Index(name="idFiliale", columns={"idFiliale"})})
 * @ORM\Entity
 */
class Ridedriver
{
    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", precision=10, scale=0, nullable=false)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="citySource", type="string", length=254, nullable=false)
     */
    private $citysource;

    /**
     * @var string
     *
     * @ORM\Column(name="placeSource", type="string", length=254, nullable=false)
     */
    private $placesource;

    /**
     * @var float
     *
     * @ORM\Column(name="longSource", type="float", precision=10, scale=0, nullable=false)
     */
    private $longsource;

    /**
     * @var float
     *
     * @ORM\Column(name="latSource", type="float", precision=10, scale=0, nullable=false)
     */
    private $latsource;

    /**
     * @var string
     *
     * @ORM\Column(name="cityDestination", type="string", length=254, nullable=false)
     */
    private $citydestination;

    /**
     * @var string
     *
     * @ORM\Column(name="placeDestination", type="string", length=254, nullable=false)
     */
    private $placedestination;

    /**
     * @var float
     *
     * @ORM\Column(name="longDestination", type="float", precision=10, scale=0, nullable=false)
     */
    private $longdestination;

    /**
     * @var float
     *
     * @ORM\Column(name="latDestination", type="float", precision=10, scale=0, nullable=false)
     */
    private $latdestination;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateTimeSource", type="datetime", nullable=false)
     */
    private $datetimesource;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbrPlaces", type="integer", nullable=false)
     */
    private $nbrplaces;

    /**
     * @var string
     *
     * @ORM\Column(name="confortVoiture", type="string", length=254, nullable=false)
     */
    private $confortvoiture;

    /**
     * @var string
     *
     * @ORM\Column(name="marqueVoiture", type="string", length=254, nullable=false)
     */
    private $marquevoiture;

    /**
     * @var string
     *
     * @ORM\Column(name="modeleVoiture", type="string", length=254, nullable=false)
     */
    private $modelevoiture;

    /**
     * @var boolean
     *
     * @ORM\Column(name="handicap", type="boolean", nullable=true)
     */
    private $handicap = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="animal", type="boolean", nullable=true)
     */
    private $animal = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="haveAnimal", type="boolean", nullable=true)
     */
    private $haveanimal = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="haveLuggage", type="boolean", nullable=false)
     */
    private $haveluggage = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="luggageMass", type="float", precision=10, scale=0, nullable=false)
     */
    private $luggagemass = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="music", type="boolean", nullable=false)
     */
    private $music = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="musicTaste", type="string", length=254, nullable=false)
     */
    private $musictaste;

    /**
     * @var boolean
     *
     * @ORM\Column(name="smoking", type="boolean", nullable=false)
     */
    private $smoking = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="allowSmoking", type="boolean", nullable=false)
     */
    private $allowsmoking = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="frequency", type="integer", nullable=true)
     */
    private $frequency;

    /**
     * @var string
     *
     * @ORM\Column(name="frequencyUnit", type="string", length=254, nullable=true)
     */
    private $frequencyunit;

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
     *   @ORM\JoinColumn(name="idDriver", referencedColumnName="id")
     * })
     */
    private $iddriver;

    /**
     * @var \ESPRITPIDEV\UserExpBundle\Entity\Filiale
     *
     * @ORM\ManyToOne(targetEntity="ESPRITPIDEV\UserExpBundle\Entity\Filiale")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idFiliale", referencedColumnName="id")
     * })
     */
    private $idfiliale;



    /**
     * Set price
     *
     * @param float $price
     *
     * @return Ridedriver
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set citysource
     *
     * @param string $citysource
     *
     * @return Ridedriver
     */
    public function setCitysource($citysource)
    {
        $this->citysource = $citysource;

        return $this;
    }

    /**
     * Get citysource
     *
     * @return string
     */
    public function getCitysource()
    {
        return $this->citysource;
    }

    /**
     * Set placesource
     *
     * @param string $placesource
     *
     * @return Ridedriver
     */
    public function setPlacesource($placesource)
    {
        $this->placesource = $placesource;

        return $this;
    }

    /**
     * Get placesource
     *
     * @return string
     */
    public function getPlacesource()
    {
        return $this->placesource;
    }

    /**
     * Set longsource
     *
     * @param float $longsource
     *
     * @return Ridedriver
     */
    public function setLongsource($longsource)
    {
        $this->longsource = $longsource;

        return $this;
    }

    /**
     * Get longsource
     *
     * @return float
     */
    public function getLongsource()
    {
        return $this->longsource;
    }

    /**
     * Set latsource
     *
     * @param float $latsource
     *
     * @return Ridedriver
     */
    public function setLatsource($latsource)
    {
        $this->latsource = $latsource;

        return $this;
    }

    /**
     * Get latsource
     *
     * @return float
     */
    public function getLatsource()
    {
        return $this->latsource;
    }

    /**
     * Set citydestination
     *
     * @param string $citydestination
     *
     * @return Ridedriver
     */
    public function setCitydestination($citydestination)
    {
        $this->citydestination = $citydestination;

        return $this;
    }

    /**
     * Get citydestination
     *
     * @return string
     */
    public function getCitydestination()
    {
        return $this->citydestination;
    }

    /**
     * Set placedestination
     *
     * @param string $placedestination
     *
     * @return Ridedriver
     */
    public function setPlacedestination($placedestination)
    {
        $this->placedestination = $placedestination;

        return $this;
    }

    /**
     * Get placedestination
     *
     * @return string
     */
    public function getPlacedestination()
    {
        return $this->placedestination;
    }

    /**
     * Set longdestination
     *
     * @param float $longdestination
     *
     * @return Ridedriver
     */
    public function setLongdestination($longdestination)
    {
        $this->longdestination = $longdestination;

        return $this;
    }

    /**
     * Get longdestination
     *
     * @return float
     */
    public function getLongdestination()
    {
        return $this->longdestination;
    }

    /**
     * Set latdestination
     *
     * @param float $latdestination
     *
     * @return Ridedriver
     */
    public function setLatdestination($latdestination)
    {
        $this->latdestination = $latdestination;

        return $this;
    }

    /**
     * Get latdestination
     *
     * @return float
     */
    public function getLatdestination()
    {
        return $this->latdestination;
    }

    /**
     * Set datetimesource
     *
     * @param \DateTime $datetimesource
     *
     * @return Ridedriver
     */
    public function setDatetimesource($datetimesource)
    {
        $this->datetimesource = $datetimesource;

        return $this;
    }

    /**
     * Get datetimesource
     *
     * @return \DateTime
     */
    public function getDatetimesource()
    {
        return $this->datetimesource;
    }

    /**
     * Set nbrplaces
     *
     * @param integer $nbrplaces
     *
     * @return Ridedriver
     */
    public function setNbrplaces($nbrplaces)
    {
        $this->nbrplaces = $nbrplaces;

        return $this;
    }

    /**
     * Get nbrplaces
     *
     * @return integer
     */
    public function getNbrplaces()
    {
        return $this->nbrplaces;
    }

    /**
     * Set confortvoiture
     *
     * @param string $confortvoiture
     *
     * @return Ridedriver
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
     * Set marquevoiture
     *
     * @param string $marquevoiture
     *
     * @return Ridedriver
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
     * Set modelevoiture
     *
     * @param string $modelevoiture
     *
     * @return Ridedriver
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
     * Set handicap
     *
     * @param boolean $handicap
     *
     * @return Ridedriver
     */
    public function setHandicap($handicap)
    {
        $this->handicap = $handicap;

        return $this;
    }

    /**
     * Get handicap
     *
     * @return boolean
     */
    public function getHandicap()
    {
        return $this->handicap;
    }

    /**
     * Set animal
     *
     * @param boolean $animal
     *
     * @return Ridedriver
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
     * @return Ridedriver
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
     * Set haveluggage
     *
     * @param boolean $haveluggage
     *
     * @return Ridedriver
     */
    public function setHaveluggage($haveluggage)
    {
        $this->haveluggage = $haveluggage;

        return $this;
    }

    /**
     * Get haveluggage
     *
     * @return boolean
     */
    public function getHaveluggage()
    {
        return $this->haveluggage;
    }

    /**
     * Set luggagemass
     *
     * @param float $luggagemass
     *
     * @return Ridedriver
     */
    public function setLuggagemass($luggagemass)
    {
        $this->luggagemass = $luggagemass;

        return $this;
    }

    /**
     * Get luggagemass
     *
     * @return float
     */
    public function getLuggagemass()
    {
        return $this->luggagemass;
    }

    /**
     * Set music
     *
     * @param boolean $music
     *
     * @return Ridedriver
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
     * @return Ridedriver
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
     * @return Ridedriver
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
     * @return Ridedriver
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
     * Set frequency
     *
     * @param integer $frequency
     *
     * @return Ridedriver
     */
    public function setFrequency($frequency)
    {
        $this->frequency = $frequency;

        return $this;
    }

    /**
     * Get frequency
     *
     * @return integer
     */
    public function getFrequency()
    {
        return $this->frequency;
    }

    /**
     * Set frequencyunit
     *
     * @param string $frequencyunit
     *
     * @return Ridedriver
     */
    public function setFrequencyunit($frequencyunit)
    {
        $this->frequencyunit = $frequencyunit;

        return $this;
    }

    /**
     * Get frequencyunit
     *
     * @return string
     */
    public function getFrequencyunit()
    {
        return $this->frequencyunit;
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
     * Set iddriver
     *
     * @param \ESPRITPIDEV\UserExpBundle\Entity\User $iddriver
     *
     * @return Ridedriver
     */
    public function setIddriver(\ESPRITPIDEV\UserExpBundle\Entity\User $iddriver = null)
    {
        $this->iddriver = $iddriver;

        return $this;
    }

    /**
     * Get iddriver
     *
     * @return \ESPRITPIDEV\UserExpBundle\Entity\User
     */
    public function getIddriver()
    {
        return $this->iddriver;
    }

    /**
     * Set idfiliale
     *
     * @param \ESPRITPIDEV\UserExpBundle\Entity\Filiale $idfiliale
     *
     * @return Ridedriver
     */
    public function setIdfiliale(\ESPRITPIDEV\UserExpBundle\Entity\Filiale $idfiliale = null)
    {
        $this->idfiliale = $idfiliale;

        return $this;
    }

    /**
     * Get idfiliale
     *
     * @return \ESPRITPIDEV\UserExpBundle\Entity\Filiale
     */
    public function getIdfiliale()
    {
        return $this->idfiliale;
    }
}
