<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categoryType = array("Accessoires Vélo","Vélo","Alimentaire","ÉlectroMénager","Luminaire", "Décorartion", "Accesoires maison", "Outillage", "Informatique", "Livres" );
        for ($i = 0; $i < 10; $i++) {
            $category = new category();
            $category
            ->setName($categoryType[$i]);

            $manager->persist($category);

        $manager->flush();
    }
}
}
