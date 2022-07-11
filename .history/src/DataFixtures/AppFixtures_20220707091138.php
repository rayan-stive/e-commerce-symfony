<?php

namespace App\DataFixtures;

use App\Entity\Produit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 1; $i <= 10: $i++) {
            $produit = new Produit();
            
            $produit->setNom('Air Jordan 1');
                    ->setReference('JR1');
                    ->setCategorie('Tennis');
                    ->set
        }

        $manager->flush();
    }
}
