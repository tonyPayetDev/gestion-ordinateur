<?php

namespace GoBundle\Entity;

/**
 * Utilisateur.
 */
class Utilisateur
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $prenom;

    /**
     * @var int
     */
    private $tel;

    /**
     * @var \DateTime
     */
    private $datedenaissance;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom.
     *
     * @param string $nom
     *
     * @return Utilisateur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom.
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom.
     *
     * @param string $prenom
     *
     * @return Utilisateur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom.
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set tel.
     *
     * @param int $tel
     *
     * @return Utilisateur
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel.
     *
     * @return int
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set datedenaissance.
     *
     * @param \DateTime $datedenaissance
     *
     * @return Utilisateur
     */
    public function setDatedenaissance($datedenaissance)
    {
        $this->datedenaissance = $datedenaissance;

        return $this;
    }

    /**
     * Get datedenaissance.
     *
     * @return \DateTime
     */
    public function getDatedenaissance()
    {
        return $this->datedenaissance;
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $attributions;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->attributions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add attribution.
     *
     * @param \GoBundle\Entity\Attribution $attribution
     *
     * @return Utilisateur
     */
    public function addAttribution(\GoBundle\Entity\Attribution $attribution)
    {
        $this->attributions[] = $attribution;

        return $this;
    }

    /**
     * Remove attribution.
     *
     * @param \GoBundle\Entity\Attribution $attribution
     */
    public function removeAttribution(\GoBundle\Entity\Attribution $attribution)
    {
        $this->attributions->removeElement($attribution);
    }

    /**
     * Get attributions.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAttributions()
    {
        return $this->attributions;
    }

    /**
     * Set attributions.
     *
     * @param \GoBundle\Entity\Attribution $attributions
     *
     * @return Utilisateur
     */
    public function setAttributions(\GoBundle\Entity\Attribution $attributions = null)
    {
        $this->attributions = $attributions;

        return $this;
    }

    /**
     * @var \GoBundle\Entity\Ordinateur
     */
    private $ordinateur;

    /**
     * Set ordinateur.
     *
     * @param \GoBundle\Entity\Ordinateur $ordinateur
     *
     * @return Utilisateur
     */
    public function setOrdinateur(\GoBundle\Entity\Ordinateur $ordinateur = null)
    {
        $this->ordinateur = $ordinateur;

        return $this;
    }

    /**
     * Get ordinateur.
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
    private $attribution;

    /**
     * Get attribution.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAttribution()
    {
        return $this->attribution;
    }

    /**
     * Set attribution.
     *
     * @param \GoBundle\Entity\Attribution|null $attribution
     *
     * @return Utilisateur
     */
    public function setAttribution(\GoBundle\Entity\Attribution $attribution = null)
    {
        $this->attribution = $attribution;

        return $this;
    }
}
