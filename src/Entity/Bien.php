<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BienRepository")
 */
class Bien
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb_piece;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb_chambre;

    /**
     * @ORM\Column(type="integer")
     */
    private $superficie;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\Column(type="string",length=50)
     */
    private $chauffage;

    /**
     * @ORM\Column(type="integer")
     */
    private $annee;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $localisation;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $etat;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Types")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_type;

  

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbPiece(): ?int
    {
        return $this->nb_piece;
    }

    public function setNbPiece(int $nb_piece): self
    {
        $this->nb_piece = $nb_piece;

        return $this;
    }

    public function getNbChambre(): ?int
    {
        return $this->nb_chambre;
    }

    public function setNbChambre(int $nb_chambre): self
    {
        $this->nb_chambre = $nb_chambre;

        return $this;
    }

    public function getSuperficie(): ?int
    {
        return $this->superficie;
    }

    public function setSuperficie(int $superficie): self
    {
        $this->superficie = $superficie;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getChauffage(): ?bool
    {
        return $this->chauffage;
    }

    public function setChauffage(bool $chauffage): self
    {
        $this->chauffage = $chauffage;

        return $this;
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(int $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getIdType(): ?Types
    {
        return $this->id_type;
    }

    public function setIdType(?Types $id_type): self
    {
        $this->id_type = $id_type;

        return $this;
    }

}
