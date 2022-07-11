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
     * @Route("/produit/ajout", name="ajouter")
     */
    public function ajout() {

        $produit = new Produit();

        $form = $this->createFormBuilder($produit);
                     $form->add('nom');
                     $form->add('reference');
                     $form->add('prix');
                     $form->add('image');
                     $form->getForm();

        return $this->render('produit/ajout.html.twig');
    }
    

    /**
     * @Route("/produit/{id}", name="editer")
     */
    public function edit(Produit $produit):Response
    {
        
        return $this->render('produit/edit.html.twig', [
            'produit' => $produit
        ]);
    }

}
