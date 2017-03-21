<?php

namespace ESPRITPIDEV\UserExpBundle\Entity;
use FOS\MessageBundle\Model\ParticipantInterface;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser implements ParticipantInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
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
     * @var \ESPRITPIDEV\UserExpBundle\Entity\Filiale
     *
     * @ORM\ManyToOne(targetEntity="ESPRITPIDEV\UserExpBundle\Entity\Filiale")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idFiliale", referencedColumnName="id")
     * })
     */
    private $idfiliale;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Set idcompany
     *
     * @param \ESPRITPIDEV\UserExpBundle\Entity\Company $idcompany
     *
     * @return User
     */
    public function setIdcompany(Company $idcompany = null)
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

    /**
     * Set idfiliale
     *
     * @param \ESPRITPIDEV\UserExpBundle\Entity\Filiale $idfiliale
     *
     * @return User
     */
    public function setIdfiliale(Filiale $idfiliale = null)
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
