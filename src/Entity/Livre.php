<?php

namespace App\Entity;

use App\Repository\LivreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivreRepository::class)]
class Livre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $titre;

    #[ORM\Column(type: 'integer')]
    private $nbPages;

    #[ORM\Column(type: 'date')]
    private $dateEdition;

    #[ORM\Column(type: 'integer')]
    private $nbExemplaires;

    #[ORM\Column(type: 'float')]
    private $prix;

    #[ORM\Column(type: 'bigint')]
    private $isbn;

    #[ORM\ManyToMany(targetEntity: Editeur::class, inversedBy: 'livres')]
    private $editeur;

    #[ORM\ManyToMany(targetEntity: Categorie::class, inversedBy: 'livres')]
    private $categorie;

    #[ORM\ManyToMany(targetEntity: Auteur::class, inversedBy: 'livress')]
    private $auteur;

    #[ORM\ManyToMany(targetEntity: Emprunt::class, mappedBy: 'livre')]
    private $emprunts;

    #[ORM\Column(type: 'string', length: 255)]
    private $image;

    public function __construct()
    {
        $this->editeur = new ArrayCollection();
        $this->categorie = new ArrayCollection();
        $this->auteur = new ArrayCollection();
        $this->emprunts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getNbPages(): ?int
    {
        return $this->nbPages;
    }

    public function setNbPages(int $nbPages): self
    {
        $this->nbPages = $nbPages;

        return $this;
    }

    public function getDateEdition(): ?\DateTimeInterface
    {
        return $this->dateEdition;
    }

    public function setDateEdition(\DateTimeInterface $dateEdition): self
    {
        $this->dateEdition = $dateEdition;

        return $this;
    }

    public function getNbExemplaires(): ?int
    {
        return $this->nbExemplaires;
    }

    public function setNbExemplaires(int $nbExemplaires): self
    {
        $this->nbExemplaires = $nbExemplaires;

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

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): self
    {
        $this->isbn = $isbn;

        return $this;
    }

    /**
     * @return Collection|Editeur[]
     */
    public function getEditeur(): Collection
    {
        return $this->editeur;
    }

    public function addEditeur(Editeur $editeur): self
    {
        if (!$this->editeur->contains($editeur)) {
            $this->editeur[] = $editeur;
        }

        return $this;
    }

    public function removeEditeur(Editeur $editeur): self
    {
        $this->editeur->removeElement($editeur);

        return $this;
    }

    /**
     * @return Collection|Categorie[]
     */
    public function getCategorie(): Collection
    {
        return $this->categorie;
    }

    public function addCategorie(Categorie $categorie): self
    {
        if (!$this->categorie->contains($categorie)) {
            $this->categorie[] = $categorie;
        }

        return $this;
    }

    public function removeCategorie(Categorie $categorie): self
    {
        $this->categorie->removeElement($categorie);

        return $this;
    }

    /**
     * @return Collection|Auteur[]
     */
    public function getAuteur(): Collection
    {
        return $this->auteur;
    }

    public function addAuteur(Auteur $auteur): self
    {
        if (!$this->auteur->contains($auteur)) {
            $this->auteur[] = $auteur;
        }

        return $this;
    }

    public function removeAuteur(Auteur $auteur): self
    {
        $this->auteur->removeElement($auteur);

        return $this;
    }

    /**
     * @return Collection|Emprunt[]
     */
    public function getEmprunts(): Collection
    {
        return $this->emprunts;
    }

    public function addEmprunt(Emprunt $emprunt): self
    {
        if (!$this->emprunts->contains($emprunt)) {
            $this->emprunts[] = $emprunt;
            $emprunt->addLivre($this);
        }

        return $this;
    }

    public function removeEmprunt(Emprunt $emprunt): self
    {
        if ($this->emprunts->removeElement($emprunt)) {
            $emprunt->removeLivre($this);
        }

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
