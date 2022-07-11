<?php

namespace App\Entity;

use App\Repository\StockRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StockRepository::class)
 */
class Stock
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $qte_stock;

    /**
     * @ORM\Column(type="integer")
     */
    private $qte_alerte;

    /**
     * @ORM\ManyToOne(targetEntity=Produit::class, inversedBy="stocks")
     */
    private $produit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQteStock(): ?int
    {
        return $this->qte_stock;
    }

    public function setQteStock(int $qte_stock): self
    {
        $this->qte_stock = $qte_stock;

        return $this;
    }

    public function getQteAlerte(): ?int
    {
        return $this->qte_alerte;
    }

    public function setQteAlerte(int $qte_alerte): self
    {
        $this->qte_alerte = $qte_alerte;

        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): self
    {
        $this->produit = $produit;

        return $this;
    }
}
