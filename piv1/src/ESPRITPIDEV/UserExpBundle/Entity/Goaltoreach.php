<?php

namespace ESPRITPIDEV\UserExpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Goaltoreach
 *
 * @ORM\Table(name="goaltoreach", indexes={@ORM\Index(name="idAnimal", columns={"idAnimal"}), @ORM\Index(name="idAnimal_2", columns={"idAnimal"})})
 * @ORM\Entity
 */
class Goaltoreach
{
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=254, nullable=false)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="taille", type="float", precision=10, scale=0, nullable=false)
     */
    private $taille;

    /**
     * @var string
     *
     * @ORM\Column(name="notes", type="string", length=254, nullable=false)
     */
    private $notes;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=254, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=254, nullable=false)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=254, nullable=true)
     */
    private $photo;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \ESPRITPIDEV\UserExpBundle\Entity\Rideanimal
     *
     * @ORM\ManyToOne(targetEntity="ESPRITPIDEV\UserExpBundle\Entity\Rideanimal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idAnimal", referencedColumnName="id")
     * })
     */
    private $idanimal;



    /**
     * Set description
     *
     * @param string $description
     *
     * @return Goaltoreach
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set taille
     *
     * @param float $taille
     *
     * @return Goaltoreach
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;

        return $this;
    }

    /**
     * Get taille
     *
     * @return float
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * Set notes
     *
     * @param string $notes
     *
     * @return Goaltoreach
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Goaltoreach
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set surname
     *
     * @param string $surname
     *
     * @return Goaltoreach
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return Goaltoreach
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idanimal
     *
     * @param \ESPRITPIDEV\UserExpBundle\Entity\Rideanimal $idanimal
     *
     * @return Goaltoreach
     */
    public function setIdanimal(\ESPRITPIDEV\UserExpBundle\Entity\Rideanimal $idanimal = null)
    {
        $this->idanimal = $idanimal;

        return $this;
    }

    /**
     * Get idanimal
     *
     * @return \ESPRITPIDEV\UserExpBundle\Entity\Rideanimal
     */
    public function getIdanimal()
    {
        return $this->idanimal;
    }
}
