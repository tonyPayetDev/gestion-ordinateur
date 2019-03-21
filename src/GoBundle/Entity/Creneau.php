<?php

namespace GoBundle\Entity;

/**
 * Creneau
 */
class Creneau
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $titre;

    /**
     * @var \DateTime
     */
    private $datedebut;

    /**
     * @var \DateTime
     */
    private $datefin;


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
     * Set titre
     *
     * @param string $titre
     *
     * @return Creneau
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set datedebut
     *
     * @param \DateTime $datedebut
     *
     * @return Creneau
     */
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    /**
     * Get datedebut
     *
     * @return \DateTime
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * Set datefin
     *
     * @param \DateTime $datefin
     *
     * @return Creneau
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;

        return $this;
    }

    /**
     * Get datefin
     *
     * @return \DateTime
     */
    public function getDatefin()
    {
        return $this->datefin;
    }
    /**
     * @var \GoBundle\Entity\Attribution
     */
    private $attribution;


    /**
     * Set attribution
     *
     * @param \GoBundle\Entity\Attribution $attribution
     *
     * @return Creneau
     */
    public function setAttribution(\GoBundle\Entity\Attribution $attribution = null)
    {
        $this->attribution = $attribution;

        return $this;
    }

    /**
     * Get attribution
     *
     * @return \GoBundle\Entity\Attribution
     */
    public function getAttribution()
    {
        return $this->attribution;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->attribution = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add attribution
     *
     * @param \GoBundle\Entity\Attribution $attribution
     *
     * @return Creneau
     */
    public function addAttribution(\GoBundle\Entity\Attribution $attribution)
    {
        $this->attribution[] = $attribution;

        return $this;
    }

    /**
     * Remove attribution
     *
     * @param \GoBundle\Entity\Attribution $attribution
     */
    public function removeAttribution(\GoBundle\Entity\Attribution $attribution)
    {
        $this->attribution->removeElement($attribution);
    }
}
