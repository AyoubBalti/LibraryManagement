<?php

namespace App\Entity;

use App\Repository\EmpruntRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmpruntRepository::class)]
class Emprunt
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 20)]
    private $statut;

    #[ORM\Column(type: 'date')]
    private $dateEmp;

    #[ORM\Column(type: 'date')]
    private $dateRetoune;

    #[ORM\ManyToOne(targetEntity: Utilisateurs::class, inversedBy: 'emprunts')]
    private $utilisateur;

    #[ORM\ManyToMany(targetEntity: Livre::class, inversedBy: 'emprunts')]
    private $livre;

    public function __construct()
    {
        $this->livre = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getDateEmp(): ?\DateTimeInterface
    {
        return $this->dateEmp;
    }

    public function setDateEmp(\DateTimeInterface $dateEmp): self
    {
        $this->dateEmp = $dateEmp;

        return $this;
    }

    public function getDateRetoune(): ?\DateTimeInterface
    {
        return $this->dateRetoune;
    }

    public function setDateRetoune(\DateTimeInterface $dateRetoune): self
    {
        $this->dateRetoune = $dateRetoune;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateurs
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateurs $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * @return Collection|Livre[]
     */
    public function getLivre(): Collection
    {
        return $this->livre;
    }

    public function addLivre(Livre $livre): self
    {
        if (!$this->livre->contains($livre)) {
            $this->livre[] = $livre;
        }

        return $this;
    }

    public function removeLivre(Livre $livre): self
    {
        $this->livre->removeElement($livre);

        return $this;
    }
}
