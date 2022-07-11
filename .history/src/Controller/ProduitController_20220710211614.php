<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManager;
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
    public function index(ProduitRepository $produitRepo)
    {

        $produits = $produitRepo->findAll();

        return $this->render('produit/index.html.twig', [
            'produits'=> $produits,

        ]);
    }


    /**
     * @Route("/produit/nouveau", name="nouveau_produit")
     * @Route("/produit/{id}/edit", name="modifier_produit")
     */
    public function fromulaire(Produit $produit = null, Request $request,  EntityManager $manager) 
    {

        if(!$produit) {
            $produit = new Produit();
        }

        $form = $this->createFormBuilder($produit)
                     ->add("reference")
                     ->add("nom")
                     ->add("categorie")
                     ->add("prix")
                     ->getForm();

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) { 

            $manager->persist($produit);
           

            return $this->redirectToRoute('editer', ['id'=> $produit->getId()]);
        }

        $manager->flush();

        return $this->render('produit/nouveau.html.twig', [

            'formProduit'=> $form->createView(),

        ]);
    }
    

    /**
     * @Route("/produit/{id}", name="editer")
     */
    public function edit(Produit $produit)
    {
        
        return $this->render('produit/edite.html.twig', [
            'produit' => $produit
        ]);
    }

}
