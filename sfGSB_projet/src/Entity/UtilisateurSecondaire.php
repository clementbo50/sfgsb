<?php

namespace App\Entity;

use App\Repository\UtilisateurSecondaireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UtilisateurSecondaireRepository::class)
 */
class UtilisateurSecondaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    

    /**
     * @ORM\Column(type="integer")
     */
    private $niveaux;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $idUser;

    /**
     * @ORM\ManyToOne(targetEntity=Fichefrais::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $idFicheFrais;

   
    public function getId(): ?int
    {
        return $this->id;
    }

    

    public function getNiveaux(): ?int
    {
        return $this->niveaux;
    }

    public function setNiveaux(int $niveaux): self
    {
        $this->niveaux = $niveaux;

        return $this;
    }

    public function getIdUser(): ?Utilisateur
    {
        return $this->idUser;
    }

    public function setIdUser(?Utilisateur $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getIdFicheFrais(): ?Fichefrais
    {
        return $this->idFicheFrais;
    }

    public function setIdFicheFrais(?Fichefrais $idFicheFrais): self
    {
        $this->idFicheFrais = $idFicheFrais;

        return $this;
    }
}
