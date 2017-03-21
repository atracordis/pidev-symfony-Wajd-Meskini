<?php

namespace Chaya3niUserBundle\Entity;
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
     * @var \Chaya3niUserBundle\Entity\Company
     *
     * @ORM\ManyToOne(targetEntity="Chaya3niUserBundle\Entity\Company")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCompany", referencedColumnName="id")
     * })
     */
    private $idcompany;

    /**
     * @var \Chaya3niUserBundle\Entity\Filiale
     *
     * @ORM\ManyToOne(targetEntity="Chaya3niUserBundle\Entity\Filiale")
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
     * @param \Chaya3niUserBundle\Entity\Company $idcompany
     *
     * @return User
     */
    public function setIdcompany(\Chaya3niUserBundle\Entity\Company $idcompany = null)
    {
        $this->idcompany = $idcompany;

        return $this;
    }

    /**
     * Get idcompany
     *
     * @return \Chaya3niUserBundle\Entity\Company
     */
    public function getIdcompany()
    {
        return $this->idcompany;
    }

    /**
     * Set idfiliale
     *
     * @param \Chaya3niUserBundle\Entity\Filiale $idfiliale
     *
     * @return User
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
