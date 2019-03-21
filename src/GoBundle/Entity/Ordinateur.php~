<?php

namespace GoBundle\Entity;

/**
 * Ordinateur.
 */
class Ordinateur
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
     * @var int
     */
    private $ip;

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
     * @return Ordinateur
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
     * Set ip.
     *
     * @param int $ip
     *
     * @return Ordinateur
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip.
     *
     * @return int
     */
    public function getIp()
    {
        return $this->ip;
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
     * @return Ordinateur
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
     * @return Ordinateur
     */
    public function setAttributions(\GoBundle\Entity\Attribution $attributions = null)
    {
        $this->attributions = $attributions;

        return $this;
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
     * @return Ordinateur
     */
    public function setAttribution(\GoBundle\Entity\Attribution $attribution = null)
    {
        $this->attribution = $attribution;

        return $this;
    }
}
