<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomCategorie;

    /**
     * @ORM\OneToMany(targetEntity=Utilisateur::class, mappedBy="idCategorie", orphanRemoval=true)
     */
    private $utilisateurs;

    /**
     * @ORM\ManyToMany(targetEntity=Domaine::class, inversedBy="lescategories")
     */
    private $idDomaine;

    public function __construct()
    {
        $this->utilisateurs = new ArrayCollection();
        $this->idDomaine = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCategorie(): ?string
    {
        return $this->nomCategorie;
    }

    public function setNomCategorie(string $nomCategorie): self
    {
        $this->nomCategorie = $nomCategorie;

        return $this;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getUtilisateurs(): Collection
    {
        return $this->utilisateurs;
    }

    public function addUtilisateur(Utilisateur $utilisateur): self
    {
        if (!$this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs[] = $utilisateur;
            $utilisateur->setIdCategorie($this);
        }

        return $this;
    }

    public function removeUtilisateur(Utilisateur $utilisateur): self
    {
        if ($this->utilisateurs->removeElement($utilisateur)) {
            // set the owning side to null (unless already changed)
            if ($utilisateur->getIdCategorie() === $this) {
                $utilisateur->setIdCategorie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Domaine[]
     */
    public function getIdDomaine(): Collection
    {
        return $this->idDomaine;
    }

    public function addIdDomaine(Domaine $idDomaine): self
    {
        if (!$this->idDomaine->contains($idDomaine)) {
            $this->idDomaine[] = $idDomaine;
        }

        return $this;
    }

    public function removeIdDomaine(Domaine $idDomaine): self
    {
        $this->idDomaine->removeElement($idDomaine);

        return $this;
    }
}
