<?php

namespace GoBundle\Entity;

/**
 * Attribution
 */
class Attribution
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $titre;

    /**
     * @var \DateTime
     */
    private $datecreation;


    /**
     * Get id
     *
     * @return int
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
     * @return Attribution
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
     * Set datecreation
     *
     * @param \DateTime $datecreation
     *
     * @return Attribution
     */
    public function setDatecreation($datecreation)
    {
        $this->datecreation = $datecreation;

        return $this;
    }

    /**
     * Get datecreation
     *
     * @return \DateTime
     */
    public function getDatecreation()
    {
        return $this->datecreation;
    }
    /**
     * @var \DateTime
     */
    private $datedebut;

    /**
     * @var \DateTime
     */
    private $datefin;

    /**
     * @var \GoBundle\Entity\Utilisateur
     */
    private $utilisateur;

    /**
     * @var \GoBundle\Entity\Ordinateur
     */
    private $ordinateur;


    /**
     * Set datedebut
     *
     * @param \DateTime $datedebut
     *
     * @return Attribution
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
     * @return Attribution
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
     * Set utilisateur
     *
     * @param \GoBundle\Entity\Utilisateur $utilisateur
     *
     * @return Attribution
     */
    public function setUtilisateur(\GoBundle\Entity\Utilisateur $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \GoBundle\Entity\Utilisateur
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * Set ordinateur
     *
     * @param \GoBundle\Entity\Ordinateur $ordinateur
     *
     * @return Attribution
     */
    public function setOrdinateur(\GoBundle\Entity\Ordinateur $ordinateur = null)
    {
        $this->ordinateur = $ordinateur;

        return $this;
    }

    /**
     * Get ordinateur
     *
     * @return \GoBundle\Entity\Ordinateur
     */
    public function getOrdinateur()
    {
        return $this->ordinateur;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $creneau;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->creneau = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add creneau
     *
     * @param \GoBundle\Entity\Creneau $creneau
     *
     * @return Attribution
     */
    public function addCreneau(\GoBundle\Entity\Creneau $creneau)
    {
        $this->creneau[] = $creneau;

        return $this;
    }

    /**
     * Remove creneau
     *
     * @param \GoBundle\Entity\Creneau $creneau
     */
    public function removeCreneau(\GoBundle\Entity\Creneau $creneau)
    {
        $this->creneau->removeElement($creneau);
    }

    /**
     * Get creneau
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCreneau()
    {
        return $this->creneau;
    }

    /**
     * Set creneau
     *
     * @param \GoBundle\Entity\Creneau $creneau
     *
     * @return Attribution
     */
    public function setCreneau(\GoBundle\Entity\Creneau $creneau = null)
    {
        $this->creneau = $creneau;

        return $this;
    }

    /**
     * Add utilisateur
     *
     * @param \GoBundle\Entity\Utilisateur $utilisateur
     *
     * @return Attribution
     */
    public function addUtilisateur(\GoBundle\Entity\Utilisateur $utilisateur)
    {
        $this->utilisateur[] = $utilisateur;

        return $this;
    }

    /**
     * Remove utilisateur
     *
     * @param \GoBundle\Entity\Utilisateur $utilisateur
     */
    public function removeUtilisateur(\GoBundle\Entity\Utilisateur $utilisateur)
    {
        $this->utilisateur->removeElement($utilisateur);
    }

    /**
     * Add ordinateur
     *
     * @param \GoBundle\Entity\Ordinateur $ordinateur
     *
     * @return Attribution
     */
    public function addOrdinateur(\GoBundle\Entity\Ordinateur $ordinateur)
    {
        $this->ordinateur[] = $ordinateur;

        return $this;
    }

    /**
     * Remove ordinateur
     *
     * @param \GoBundle\Entity\Ordinateur $ordinateur
     */
    public function removeOrdinateur(\GoBundle\Entity\Ordinateur $ordinateur)
    {
        $this->ordinateur->removeElement($ordinateur);
    }
}
