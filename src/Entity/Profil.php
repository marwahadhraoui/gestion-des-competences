<?php

namespace App\Entity;

use App\Repository\ProfilRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfilRepository::class)]
class Profil
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $niveauEducation = null;

    #[ORM\Column(length: 255)]
    private ?string $dernierDiplome = null;

    #[ORM\Column(length: 255)]
    private ?string $domaineActivite = null;

    #[ORM\Column(length: 255)]
    private ?string $situationProfessionnelle = null;

    #[ORM\Column(length: 255)]
    private ?string $objectifUtilisation = null;

    #[ORM\Column]
    private ?bool $formationPayante = null;

    #[ORM\Column(length: 255)]
    private ?string $connaissanceLinguistique = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNiveauEducation(): ?string
    {
        return $this->niveauEducation;
    }

    public function setNiveauEducation(string $niveauEducation): self
    {
        $this->niveauEducation = $niveauEducation;

        return $this;
    }

    public function getDernierDiplome(): ?string
    {
        return $this->dernierDiplome;
    }

    public function setDernierDiplome(string $dernierDiplome): self
    {
        $this->dernierDiplome = $dernierDiplome;

        return $this;
    }

    public function getDomaineActivite(): ?string
    {
        return $this->domaineActivite;
    }

    public function setDomaineActivite(string $domaineActivite): self
    {
        $this->domaineActivite = $domaineActivite;

        return $this;
    }

    public function getSituationProfessionnelle(): ?string
    {
        return $this->situationProfessionnelle;
    }

    public function setSituationProfessionnelle(string $situationProfessionnelle): self
    {
        $this->situationProfessionnelle = $situationProfessionnelle;

        return $this;
    }

    public function getObjectifUtilisation(): ?string
    {
        return $this->objectifUtilisation;
    }

    public function setObjectifUtilisation(string $objectifUtilisation): self
    {
        $this->objectifUtilisation = $objectifUtilisation;

        return $this;
    }

    public function isFormationPayante(): ?bool
    {
        return $this->formationPayante;
    }

    public function setFormationPayante(bool $formationPayante): self
    {
        $this->formationPayante = $formationPayante;

        return $this;
    }

    public function getConnaissanceLinguistique(): ?string
    {
        return $this->connaissanceLinguistique;
    }

    public function setConnaissanceLinguistique(string $connaissanceLinguistique): self
    {
        $this->connaissanceLinguistique = $connaissanceLinguistique;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

}
