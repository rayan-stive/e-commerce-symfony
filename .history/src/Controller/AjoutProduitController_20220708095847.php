<?php

namespace App\Controller;

use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AjoutProduitController extends AbstractController
{
    /**
     * @Route("/ajout/produit", name="app_ajout_produit")
     */
    public function index(): Response
    {
        $produit = new Produit();

        return $this->render('ajout_produit/index.html.twig', [
            'controller_name' => 'AjoutProduitController',
        ]);
    }
}
