<?php

namespace App\Entity;

use App\Repository\EditeurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EditeurRepository::class)]
class Editeur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 30)]
    private $nomEditeur;

    #[ORM\Column(type: 'string', length: 30)]
    private $prenomEditeur;

    #[ORM\Column(type: 'string', length: 50)]
    private $pays;

    #[ORM\Column(type: 'string', length: 100)]
    private $adresse;

    #[ORM\Column(type: 'integer')]
    private $telephone;

    #[ORM\OneToMany(mappedBy: 'editeurs', targetEntity: Livre::class)]
    private $auteurs;

    #[ORM\ManyToMany(targetEntity: Livre::class, mappedBy: 'editeur')]
    private $livres;

    public function __construct()
    {
        $this->auteurs = new ArrayCollection();
        $this->livres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEditeur(): ?string
    {
        return $this->nomEditeur;
    }

    public function setNomEditeur(string $nomEditeur): self
    {
        $this->nomEditeur = $nomEditeur;

        return $this;
    }

    public function getPrenomEditeur(): ?string
    {
        return $this->prenomEditeur;
    }

    public function setPrenomEditeur(string $prenomEditeur): self
    {
        $this->prenomEditeur = $prenomEditeur;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * @return Collection|Livre[]
     */
    public function getLivres(): Collection
    {
        return $this->livres;
    }

    public function addLivre(Livre $livre): self
    {
        if (!$this->livres->contains($livre)) {
            $this->livres[] = $livre;
            $livre->addEditeur($this);
        }

        return $this;
    }

    public function removeLivre(Livre $livre): self
    {
        if ($this->livres->removeElement($livre)) {
            $livre->removeEditeur($this);
        }

        return $this;
    }



    
}
