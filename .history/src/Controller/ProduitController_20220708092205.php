<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{
    /**
     * @Route("/produit", name="app_produit")
     */
    public function index(ProduitRepository $repos): Response
    {

        $produits = $repos->findAll();

        return $this->render('produit/index.html.twig', [
            'produits'=> $produits,

        ]);
    }

    /**
     * @Route("/produit/{id}", name="app_edit")
     */
    public function edit(Produit $produit):Response
    {
        
        return $this->render('produit/edit.html.twig', [
            'produit' => $produit
        ]);
    }
}
