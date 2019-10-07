<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VisiteRepository")
 */
class Visite
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Bien")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_Bien;

    

    /**
     * @ORM\Column(type="string",length=100)
     */
    private $suite;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Visiteur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_visiteur;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $id_date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdBien(): ?Bien
    {
        return $this->id_Bien;
    }

    public function setIdBien(?Bien $id_Bien): self
    {
        $this->id_Bien = $id_Bien;

        return $this;
    }

    public function getIdDate(): ?Visiteur
    {
        return $this->id_date;
    }

    public function setIdDate(?Visiteur $id_date): self
    {
        $this->id_date = $id_date;

        return $this;
    }

    public function getSuite(): ?string
    {
        return $this->suite;
    }

    public function setSuite(string $suite): self
    {
        $this->suite = $suite;

        return $this;
    }

    public function getIdVisiteur(): ?Visiteur
    {
        return $this->id_visiteur;
    }

    public function setIdVisiteur(?Visiteur $id_visiteur): self
    {
        $this->id_visiteur = $id_visiteur;

        return $this;
    }
}
