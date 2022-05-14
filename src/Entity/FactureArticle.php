<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FactureArticleRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;


#[ORM\Entity(repositoryClass: FactureArticleRepository::class)]
#[ApiResource(normalizationContext: ['groups' => ['factureArticle']])]
class FactureArticle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]    
    private $id;

    #[ORM\Column(type: 'integer')]
    #[Groups("factureArticle")]
    private $quantite;

    #[ORM\Column(type: 'float')]
    #[Groups("factureArticle")]
    private $puht;

    #[ORM\Column(type: 'integer')]
    #[Groups("factureArticle")]
    private $remise;

    #[ORM\Column(type: 'float')]
    #[Groups("factureArticle")]
    private $tua;

    #[ORM\Column(type: 'float')]
    #[Groups("factureArticle")]
    private $totalht;

    #[ORM\Column(type: 'float')]
    #[Groups("factureArticle")]
    private $totale;

    #[Groups("factureArticle")]
    #[ORM\ManyToOne(targetEntity: Article::class, inversedBy: 'factureArticles')]
    #[ORM\JoinColumn(nullable: false)]
    private $article;

    #[Groups("factureArticle")]
    #[ORM\ManyToOne(targetEntity: Facture::class, inversedBy: 'factureArticles')]
    #[ORM\JoinColumn(nullable: false)]
    private $facture;

    

    public function getId(): ?int
    {
        return $this->id;
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

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getFacture(): ?Facture
    {
        return $this->facture;
    }

    public function setFacture(?Facture $facture): self
    {
        $this->facture = $facture;

        return $this;
    }

    public function getTotale(): ?float
    {
        return $this->totale;
    }

    public function setTotale(float $totale): self
    {
        $this->totale = $totale;

        return $this;
    }

    public function getPuht(): ?float
    {
        return $this->puht;
    }

    public function setPuht(float $puht): self
    {
        $this->puht = $puht;

        return $this;
    }

    public function getRemise(): ?int
    {
        return $this->remise;
    }

    public function setRemise(int $remise): self
    {
        $this->remise = $remise;

        return $this;
    }

    public function getTua(): ?float
    {
        return $this->tua;
    }

    public function setTua(float $tua): self
    {
        $this->tua = $tua;

        return $this;
    }

    public function getTotalht(): ?float
    {
        return $this->totalht;
    }

    public function setTotalht(float $totalht): self
    {
        $this->totalht = $totalht;

        return $this;
    }
    
}
