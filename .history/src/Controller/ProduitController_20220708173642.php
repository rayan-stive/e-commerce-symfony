<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/nouveau", name="produit_new")
     */
    public function create(Request $request) {

        $produit = new Produit();

        $form = $this->createFormBuilder($produit)->add('reference')
                     ->add('nom')
                     ->add('categorie')
                     ->add('prix')
                     ->getForm();

        return $this->render('produit/nouveau.html.twig', [
            'formProduit'=> $form->createView()
        ]);
    }
    

    /**
     * @Route("/produit/{id}", name="editer")
     */
    public function edit(Produit $produit):Response
    {
        
        return $this->render('produit/edite.html.twig', [
            'produit' => $produit
        ]);
    }

}
