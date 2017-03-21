<?php

namespace ESPRITPIDEV\UserExpBundle\Entity;

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
     * @var \ESPRITPIDEV\UserExpBundle\Entity\Company
     *
     * @ORM\ManyToOne(targetEntity="ESPRITPIDEV\UserExpBundle\Entity\Company")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCompany", referencedColumnName="id")
     * })
     */
    private $idcompany;



    /**
     * Set address1
     *
     * @param string $address1
     *
     * @return Filiale
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;

        return $this;
    }

    /**
     * Get address1
     *
     * @return string
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * Set address2
     *
     * @param string $address2
     *
     * @return Filiale
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;

        return $this;
    }

    /**
     * Get address2
     *
     * @return string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * Set codepostal
     *
     * @param integer $codepostal
     *
     * @return Filiale
     */
    public function setCodepostal($codepostal)
    {
        $this->codepostal = $codepostal;

        return $this;
    }

    /**
     * Get codepostal
     *
     * @return integer
     */
    public function getCodepostal()
    {
        return $this->codepostal;
    }

    /**
     * Set latitude
     *
     * @param integer $latitude
     *
     * @return Filiale
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
     * @return Filiale
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idcompany
     *
     * @param \ESPRITPIDEV\UserExpBundle\Entity\Company $idcompany
     *
     * @return Filiale
     */
    public function setIdcompany(\ESPRITPIDEV\UserExpBundle\Entity\Company $idcompany = null)
    {
        $this->idcompany = $idcompany;

        return $this;
    }

    /**
     * Get idcompany
     *
     * @return \ESPRITPIDEV\UserExpBundle\Entity\Company
     */
    public function getIdcompany()
    {
        return $this->idcompany;
    }
}
