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

        $produit = $repos->findAll();
        return $this->render('produit/index.html.twig', [
            'produits'=> $produit,

        ]);
    }
}
