<?php

namespace App\DataFixtures;

use App\Entity\Produit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 1; $i<10; $i++) {
            
        }
        for($i = 1; $i <= 10; $i++) {
            $produit = new Produit();

            $produit->setReference('JRD1')
                    ->setNom("Air Jordan")
                    ->setCategorie('Chaussure')
                    ->setPrix(120000);

            $manager->persist($produit);
        }
        $manager->flush();
        
    }
}
