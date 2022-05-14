<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FactureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: FactureRepository::class)]
#[ApiResource(normalizationContext: ['groups' => ['facture']])]
class Facture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups("facture")]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups("facture")]
    private $adresse;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups("facture")]
    private $date;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups("facture")]
    private $matriculefixal;

    #[Groups("facture")]
    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'factures')]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    #[Groups("facture")]
    #[ORM\OneToMany(mappedBy: 'facture', targetEntity: FactureArticle::class)]
    private $factureArticles;

    public function __construct()
    {
        $this->factureArticles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getMatriculefixal(): ?string
    {
        return $this->matriculefixal;
    }

    public function setMatriculefixal(string $matriculefixal): self
    {
        $this->matriculefixal = $matriculefixal;

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

    /**
     * @return Collection<int, FactureArticle>
     */
    public function getFactureArticles(): Collection
    {
        return $this->factureArticles;
    }

    public function addFactureArticle(FactureArticle $factureArticle): self
    {
        if (!$this->factureArticles->contains($factureArticle)) {
            $this->factureArticles[] = $factureArticle;
            $factureArticle->setFacture($this);
        }

        return $this;
    }

    public function removeFactureArticle(FactureArticle $factureArticle): self
    {
        if ($this->factureArticles->removeElement($factureArticle)) {
            // set the owning side to null (unless already changed)
            if ($factureArticle->getFacture() === $this) {
                $factureArticle->setFacture(null);
            }
        }

        return $this;
    }
    
}
