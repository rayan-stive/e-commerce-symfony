<?php

namespace App\DataFixtures;

use App\Entity\Produit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 1; $i <= 10; $i++) {
            $produit = new Produit();

            $produit->setReference('JRD1');
            $produit->setNom("Air Jordan");
            $produit->setCategorie('Chaussure');
            $produit->setPrix(120000);

            $manager->persist($produit)

        }

        $manager->flush();
    }
}
