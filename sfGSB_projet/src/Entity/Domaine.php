<?php

namespace App\Entity;

use App\Repository\DomaineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DomaineRepository::class)
 */
class Domaine
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nomDomaine;

    /**
     * @ORM\ManyToMany(targetEntity=Categorie::class, mappedBy="idDomaine")
     */
    private $lescategories;

    

    public function __construct()
    {
        
        $this->lescategories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomDomaine(): ?string
    {
        return $this->nomDomaine;
    }

    public function setNomDomaine(string $nomDomaine): self
    {
        $this->nomDomaine = $nomDomaine;

        return $this;
    }

    /**
     * @return Collection|Categorie[]
     */
    public function getLescategories(): Collection
    {
        return $this->lescategories;
    }

    public function addLescategory(Categorie $lescategory): self
    {
        if (!$this->lescategories->contains($lescategory)) {
            $this->lescategories[] = $lescategory;
            $lescategory->addIdDomaine($this);
        }

        return $this;
    }

    public function removeLescategory(Categorie $lescategory): self
    {
        if ($this->lescategories->removeElement($lescategory)) {
            $lescategory->removeIdDomaine($this);
        }

        return $this;
    }

    
}
