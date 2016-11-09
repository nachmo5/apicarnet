<?php

namespace apicarnetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity(repositoryClass="apicarnetBundle\Repository\ContactRepository")
 */
class Contact
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="civilite", type="string", length=255)
     */
    private $civilite;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_de_naissance", type="date", nullable=true)
     */
    private $dateDeNaissance;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cree_le", type="datetime", nullable=true)
     */
    private $creeLe;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="misajour_le", type="datetime", nullable=true)
     */
    private $misajourLe;


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
     * Set civilite
     *
     * @param string $civilite
     * @return Contact
     */
    public function setCivilite($civilite)
    {
        $this->civilite = $civilite;

        return $this;
    }

    /**
     * Get civilite
     *
     * @return string 
     */
    public function getCivilite()
    {
        return $this->civilite;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Contact
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Contact
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set dateDeNaissance
     *
     * @param \DateTime $dateDeNaissance
     * @return Contact
     */
    public function setDateDeNaissance($dateDeNaissance)
    {
        $this->dateDeNaissance = $dateDeNaissance;

        return $this;
    }

    /**
     * Get dateDeNaissance
     *
     * @return \DateTime 
     */
    public function getDateDeNaissance()
    {
        return $this->dateDeNaissance;
    }

    /**
     * Set creeLe
     *
     * @param \DateTime $creeLe
     * @return Contact
     */
    public function setCreeLe($creeLe)
    {
        $this->creeLe = $creeLe;

        return $this;
    }

    /**
     * Get creeLe
     *
     * @return \DateTime 
     */
    public function getCreeLe()
    {
        return $this->creeLe;
    }

    /**
     * Set misajourLe
     *
     * @param \DateTime $misajourLe
     * @return Contact
     */
    public function setMisajourLe($misajourLe)
    {
        $this->misajourLe = $misajourLe;

        return $this;
    }

    /**
     * Get misajourLe
     *
     * @return \DateTime 
     */
    public function getMisajourLe()
    {
        return $this->misajourLe;
    }
}
