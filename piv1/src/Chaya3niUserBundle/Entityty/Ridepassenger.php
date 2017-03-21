<?php

namespace Chaya3niUserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ridepassenger
 *
 * @ORM\Table(name="ridepassenger", indexes={@ORM\Index(name="idPassenger", columns={"idPassenger"}), @ORM\Index(name="id", columns={"id"}), @ORM\Index(name="idFiliale", columns={"idFiliale"})})
 * @ORM\Entity
 */
class Ridepassenger
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
     * @var integer
     *
     * @ORM\Column(name="longSource", type="integer", nullable=false)
     */
    private $longsource;

    /**
     * @var integer
     *
     * @ORM\Column(name="latSource", type="integer", nullable=false)
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
     * @var integer
     *
     * @ORM\Column(name="longDestination", type="integer", nullable=false)
     */
    private $longdestination;

    /**
     * @var integer
     *
     * @ORM\Column(name="latDestination", type="integer", nullable=false)
     */
    private $latdestination;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateTimeRangeSource", type="datetime", nullable=false)
     */
    private $datetimerangesource;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateTimeRangeDestination", type="datetime", nullable=false)
     */
    private $datetimerangedestination;

    /**
     * @var boolean
     *
     * @ORM\Column(name="handicap", type="boolean", nullable=false)
     */
    private $handicap = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="animal", type="boolean", nullable=false)
     */
    private $animal = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="haveAnimal", type="boolean", nullable=false)
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
     * @ORM\Column(name="type", type="integer", nullable=false)
     */
    private $type;

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
     * @var \Chaya3niUserBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Chaya3niUserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idPassenger", referencedColumnName="id")
     * })
     */
    private $idpassenger;

    /**
     * @var \Chaya3niUserBundle\Entity\Filiale
     *
     * @ORM\ManyToOne(targetEntity="Chaya3niUserBundle\Entity\Filiale")
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
     * @return Ridepassenger
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
     * @return Ridepassenger
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
     * @return Ridepassenger
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
     * @param integer $longsource
     *
     * @return Ridepassenger
     */
    public function setLongsource($longsource)
    {
        $this->longsource = $longsource;

        return $this;
    }

    /**
     * Get longsource
     *
     * @return integer
     */
    public function getLongsource()
    {
        return $this->longsource;
    }

    /**
     * Set latsource
     *
     * @param integer $latsource
     *
     * @return Ridepassenger
     */
    public function setLatsource($latsource)
    {
        $this->latsource = $latsource;

        return $this;
    }

    /**
     * Get latsource
     *
     * @return integer
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
     * @return Ridepassenger
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
     * @return Ridepassenger
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
     * @param integer $longdestination
     *
     * @return Ridepassenger
     */
    public function setLongdestination($longdestination)
    {
        $this->longdestination = $longdestination;

        return $this;
    }

    /**
     * Get longdestination
     *
     * @return integer
     */
    public function getLongdestination()
    {
        return $this->longdestination;
    }

    /**
     * Set latdestination
     *
     * @param integer $latdestination
     *
     * @return Ridepassenger
     */
    public function setLatdestination($latdestination)
    {
        $this->latdestination = $latdestination;

        return $this;
    }

    /**
     * Get latdestination
     *
     * @return integer
     */
    public function getLatdestination()
    {
        return $this->latdestination;
    }

    /**
     * Set datetimerangesource
     *
     * @param \DateTime $datetimerangesource
     *
     * @return Ridepassenger
     */
    public function setDatetimerangesource($datetimerangesource)
    {
        $this->datetimerangesource = $datetimerangesource;

        return $this;
    }

    /**
     * Get datetimerangesource
     *
     * @return \DateTime
     */
    public function getDatetimerangesource()
    {
        return $this->datetimerangesource;
    }

    /**
     * Set datetimerangedestination
     *
     * @param \DateTime $datetimerangedestination
     *
     * @return Ridepassenger
     */
    public function setDatetimerangedestination($datetimerangedestination)
    {
        $this->datetimerangedestination = $datetimerangedestination;

        return $this;
    }

    /**
     * Get datetimerangedestination
     *
     * @return \DateTime
     */
    public function getDatetimerangedestination()
    {
        return $this->datetimerangedestination;
    }

    /**
     * Set handicap
     *
     * @param boolean $handicap
     *
     * @return Ridepassenger
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
     * @return Ridepassenger
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
     * @return Ridepassenger
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
     * @return Ridepassenger
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
     * @return Ridepassenger
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
     * @return Ridepassenger
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
     * @return Ridepassenger
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
     * @return Ridepassenger
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
     * @return Ridepassenger
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
     * Set type
     *
     * @param integer $type
     *
     * @return Ridepassenger
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set frequency
     *
     * @param integer $frequency
     *
     * @return Ridepassenger
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
     * @return Ridepassenger
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
     * Set idpassenger
     *
     * @param \Chaya3niUserBundle\Entity\User $idpassenger
     *
     * @return Ridepassenger
     */
    public function setIdpassenger(\Chaya3niUserBundle\Entity\User $idpassenger = null)
    {
        $this->idpassenger = $idpassenger;

        return $this;
    }

    /**
     * Get idpassenger
     *
     * @return \Chaya3niUserBundle\Entity\User
     */
    public function getIdpassenger()
    {
        return $this->idpassenger;
    }

    /**
     * Set idfiliale
     *
     * @param \Chaya3niUserBundle\Entity\Filiale $idfiliale
     *
     * @return Ridepassenger
     */
    public function setIdfiliale(\Chaya3niUserBundle\Entity\Filiale $idfiliale = null)
    {
        $this->idfiliale = $idfiliale;

        return $this;
    }

    /**
     * Get idfiliale
     *
     * @return \Chaya3niUserBundle\Entity\Filiale
     */
    public function getIdfiliale()
    {
        return $this->idfiliale;
    }
}
