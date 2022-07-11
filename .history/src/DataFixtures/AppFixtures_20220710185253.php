<?php

namespace App\DataFixtures;

use App\Entity\Client;
use App\Entity\Fournisseur;
use App\Entity\Produit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        
        // creation des client 1
        $client = new Client();

        $client->setNom('Rayan')
                ->setPrenom('Stive')
                ->setTelephone('0343357003')
                ->setAdresse('Isada Fianarantsoa');
        $manager->persist($client);

        // creation des client 2
        $client2 = new Client();

        $client2->setNom('Malalatina')
                ->setPrenom('Nicole')
                ->setTelephone('0349344088')
                ->setAdresse('Andrainjato Fianarantsoa');
        $manager->persist($client2);
    
        // creation des produit
        for($i = 1; $i <= 10; $i++) {
            $produit = new Produit();

            $produit->setReference("REF$i")
                    ->setNom("Produit $i")
                    ->setCategorie("Categorie $i")
                    ->setPrix(mt_rand(10000, 20000));

            $manager->persist($produit);
        }

        // Creation des fournisseur
        $fournisseur = new Fournisseur();

        $fournisseur->setNom("Hajanantenaina")
                    ->setPrenom("Edouard")
                    ->setCin("20103104792989")
                    ->setTelephone("0342290323")
                    ->setAdresse("Tanambao Fianarantsoa");
        $manager->persist($fournisseur);


        for($j=1; $j<10; $j++) {
            
        }

        $manager->flush();
        
    }
}
