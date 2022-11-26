<?php

namespace App\Entity;

use App\Repository\TestRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TestRepository::class)]
class Test
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    private ?int $score = null;

    #[ORM\Column(nullable: true)]
    private array $question = [];

    #[ORM\Column(nullable: true)]
    private array $competences = [];

    #[ORM\OneToMany(mappedBy: 'test', targetEntity: Categorie::class)]
    private Collection $categorie;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo = null;

    public function __construct()
    {
        $this->categorie = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(?int $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getQuestion(): array
    {
        return $this->question;
    }

    public function setQuestion(?array $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getCompetences(): array
    {
        return $this->competences;
    }

    public function setCompetences(?array $competences): self
    {
        $this->competences = $competences;

        return $this;
    }

    /**
     * @return Collection<int, Categorie>
     */
    public function getCategorie(): Collection
    {
        return $this->categorie;
    }

    public function addCategorie(Categorie $categorie): self
    {
        if (!$this->categorie->contains($categorie)) {
            $this->categorie->add($categorie);
            $categorie->setTest($this);
        }

        return $this;
    }

    public function removeCategorie(Categorie $categorie): self
    {
        if ($this->categorie->removeElement($categorie)) {
            // set the owning side to null (unless already changed)
            if ($categorie->getTest() === $this) {
                $categorie->setTest(null);
            }
        }

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }
}
