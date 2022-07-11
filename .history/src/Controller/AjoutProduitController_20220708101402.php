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

        $form = $this->createFormBuilder($produit);

        $form->add('reference');
        $form->add('nom');
        $form->add('categorie');
        $form->add('prix');

        $form->getForm();

        return $this->render('ajout_produit/index.html.twig', [
            'formulaire' => $form,
        ]);
    }
}
