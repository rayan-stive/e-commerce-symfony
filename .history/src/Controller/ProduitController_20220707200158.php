<?php

namespace App\Controller;

use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{
    /**
     * @Route("/produit", name="app_produit")
     */
    public function index(): Response
    {
        $repos = $this->getDoctrine()->getRepository(Produit::class);

        $produits = $repos->findAll();
        return $this->render('produit/index.html.twig', [
            'produits'=> $produits,

        ]);
    }

    /**
     * @Route("/produit/1", name="app_edit")
     */
    public function edit()
    {
        return $this->render('produit/edit.html.twig/1');
    }
}
