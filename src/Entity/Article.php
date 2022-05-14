<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\ArticleController;
use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiProperty;
use Symfony\Component\Serializer\Annotation\Groups;


#[ORM\Entity(repositoryClass: ArticleRepository::class)]
#[ApiResource]

class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[Groups("factureArticle")]
    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[Groups("factureArticle")]
    #[ORM\Column(type: 'float')]
    private $prix;

    #[ORM\Column(type: 'integer')]
    private $disponible;

    #[Groups("factureArticle")]
    #[ORM\Column(type: 'string', length: 255)]
    private $marque;

    #[ORM\Column(type: 'string', length: 255)]
    private $fournisseur;

    #[ORM\Column(type: 'string', length: 255)]
    #[ApiProperty(
        iri:"http://schema.org/image",
            attributes:[
                "openapi_context"=>[
                    "type"=>"string",
                    "format"=>"url"
                ]
            ]
     )]
     public ?string $image = null;

    #[ORM\Column(type: 'integer')]
    private $quantite;        

    #[ORM\ManyToMany(targetEntity: Devis::class, mappedBy: 'article')]
    private $devis;

    #[ORM\ManyToOne(targetEntity: SousCategorie::class, inversedBy: 'articles')]
    #[ORM\JoinColumn(nullable: false)]
    private $souscat;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'float')]
    private $tva;

    
    #[ORM\OneToMany(mappedBy: 'article', targetEntity: FactureArticle::class)]    
    private $factureArticles;

    public function __construct()
    {
        $this->devis = new ArrayCollection();
        $this->factureArticles = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->nom;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

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

    public function getDisponible(): ?int
    {
        return $this->disponible;
    }

    public function setDisponible(int $disponible): self
    {
        $this->disponible = $disponible;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getFournisseur(): ?string
    {
        return $this->fournisseur;
    }

    public function setFournisseur(string $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

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

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }        

    /**
     * @return Collection<int, Devis>
     */
    public function getDevis(): Collection
    {
        return $this->devis;
    }

    public function addDevi(Devis $devi): self
    {
        if (!$this->devis->contains($devi)) {
            $this->devis[] = $devi;
            $devi->addArticle($this);
        }

        return $this;
    }

    public function removeDevi(Devis $devi): self
    {
        if ($this->devis->removeElement($devi)) {
            $devi->removeArticle($this);
        }

        return $this;
    }

    public function getSouscat(): ?SousCategorie
    {
        return $this->souscat;
    }

    public function setSouscat(?SousCategorie $souscat): self
    {
        $this->souscat = $souscat;

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

    public function getTva(): ?float
    {
        return $this->tva;
    }

    public function setTva(float $tva): self
    {
        $this->tva = $tva;

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
            $factureArticle->setArticle($this);
        }

        return $this;
    }

    public function removeFactureArticle(FactureArticle $factureArticle): self
    {
        if ($this->factureArticles->removeElement($factureArticle)) {
            // set the owning side to null (unless already changed)
            if ($factureArticle->getArticle() === $this) {
                $factureArticle->setArticle(null);
            }
        }

        return $this;
    }
}
