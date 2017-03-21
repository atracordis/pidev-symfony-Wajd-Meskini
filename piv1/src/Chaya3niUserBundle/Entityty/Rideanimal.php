<?php

namespace Chaya3niUserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rideanimal
 *
 * @ORM\Table(name="rideanimal")
 * @ORM\Entity
 */
class Rideanimal
{
    /**
     * @var string
     *
     * @ORM\Column(name="nameAnimal", type="string", length=254, nullable=false)
     */
    private $nameanimal;

    /**
     * @var string
     *
     * @ORM\Column(name="speciesAnimal", type="string", length=254, nullable=false)
     */
    private $speciesanimal;

    /**
     * @var boolean
     *
     * @ORM\Column(name="haveLuggage", type="boolean", nullable=true)
     */
    private $haveluggage;

    /**
     * @var float
     *
     * @ORM\Column(name="luggageMass", type="float", precision=10, scale=0, nullable=false)
     */
    private $luggagemass = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="animalMass", type="float", precision=10, scale=0, nullable=false)
     */
    private $animalmass = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="specialNeeds", type="string", length=254, nullable=false)
     */
    private $specialneeds;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=254, nullable=true)
     */
    private $photo;

    /**
     * @var integer
     *
     * @ORM\Column(name="idride", type="integer", nullable=true)
     */
    private $idride;

    /**
     * @var \Chaya3niUserBundle\Entity\Ridepassenger
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Chaya3niUserBundle\Entity\Ridepassenger")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;



    /**
     * Set nameanimal
     *
     * @param string $nameanimal
     *
     * @return Rideanimal
     */
    public function setNameanimal($nameanimal)
    {
        $this->nameanimal = $nameanimal;

        return $this;
    }

    /**
     * Get nameanimal
     *
     * @return string
     */
    public function getNameanimal()
    {
        return $this->nameanimal;
    }

    /**
     * Set speciesanimal
     *
     * @param string $speciesanimal
     *
     * @return Rideanimal
     */
    public function setSpeciesanimal($speciesanimal)
    {
        $this->speciesanimal = $speciesanimal;

        return $this;
    }

    /**
     * Get speciesanimal
     *
     * @return string
     */
    public function getSpeciesanimal()
    {
        return $this->speciesanimal;
    }

    /**
     * Set haveluggage
     *
     * @param boolean $haveluggage
     *
     * @return Rideanimal
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
     * @return Rideanimal
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
     * Set animalmass
     *
     * @param float $animalmass
     *
     * @return Rideanimal
     */
    public function setAnimalmass($animalmass)
    {
        $this->animalmass = $animalmass;

        return $this;
    }

    /**
     * Get animalmass
     *
     * @return float
     */
    public function getAnimalmass()
    {
        return $this->animalmass;
    }

    /**
     * Set specialneeds
     *
     * @param string $specialneeds
     *
     * @return Rideanimal
     */
    public function setSpecialneeds($specialneeds)
    {
        $this->specialneeds = $specialneeds;

        return $this;
    }

    /**
     * Get specialneeds
     *
     * @return string
     */
    public function getSpecialneeds()
    {
        return $this->specialneeds;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return Rideanimal
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set idride
     *
     * @param integer $idride
     *
     * @return Rideanimal
     */
    public function setIdride($idride)
    {
        $this->idride = $idride;

        return $this;
    }

    /**
     * Get idride
     *
     * @return integer
     */
    public function getIdride()
    {
        return $this->idride;
    }

    /**
     * Set id
     *
     * @param \Chaya3niUserBundle\Entity\Ridepassenger $id
     *
     * @return Rideanimal
     */
    public function setId(\Chaya3niUserBundle\Entity\Ridepassenger $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return \Chaya3niUserBundle\Entity\Ridepassenger
     */
    public function getId()
    {
        return $this->id;
    }
}
