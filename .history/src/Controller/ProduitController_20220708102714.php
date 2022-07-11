<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form;

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
     * @Route("/produit/new", name="produit_new")
     */
    public function create(Request $request, ObjectManager $manger) {

        $produit = new Produit();

        $form = $this->createFormBuilder($produit);

        $form->add('reference');
        $form->add('nom');
        $form->add('categorie');
        $form->add('prix');

        $form->getForm();

        return $this->render('produit/ajout.html.twig', [
            'form'=>$form->createView(),
        ]);
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
