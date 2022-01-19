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

    #[ORM\Column(type: 'string', length: 255)]
    private $titre;

    #[ORM\Column(type: 'integer')]
    private $nbPages;

    #[ORM\Column(type: 'date')]
    private $dateEdition;

    #[ORM\Column(type: 'integer')]
    private $nbExemplaires;

    #[ORM\Column(type: 'integer')]
    private $prix;

    #[ORM\Column(type: 'bigint')]
    private $isbn;

    #[ORM\ManyToMany(targetEntity: Auteur::class, inversedBy: 'livres')]
    private $auteurs;

    #[ORM\ManyToMany(targetEntity: Categorie::class, inversedBy: 'livres')]
    private $categories ;

    #[ORM\ManyToOne(targetEntity: Editeur::class, inversedBy: 'livres')]
    private $editeurs;

    public function __construct()
    {
        $this->auteurs = new ArrayCollection();
        $this->categories  = new ArrayCollection();
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

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
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
     * @return Collection|Auteur[]
     */
    public function getRelation(): Collection
    {
        return $this->auteurs;
    }

    public function addRelation(Auteur $categories ): self
    {
        if (!$this->auteurs->contains($categories )) {
            $this->auteurs[] = $categories ;
        }

        return $this;
    }

    public function removeRelation(Auteur $categories ): self
    {
        $this->auteurs->removeElement($categories );

        return $this;
    }

    public function getRelation2(): ?Editeur
    {
        return $this->editeurs;
    }

    public function setRelation2(?Editeur $editeurs): self
    {
        $this->editeurs = $editeurs;

        return $this;
    }
}
