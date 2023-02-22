<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Persistence\ManagerRegistry;

class ProductFixtures extends Fixture
{

    private ManagerRegistry $manager;
    private Category $tempcategory;
    
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->manager = $doctrine;
        $this->tempcategory= $this->manager->getRepository(Category::class)->find(mt_rand(12, 21));

    }

    private function random_float($min, $max) {
        return round(random_int($min, $max - 1) + (random_int(0, PHP_INT_MAX - 1) / PHP_INT_MAX ), 2);
    }

 
    public function load(ObjectManager $manager,): void
    { 
        $temp = new Category();
        $temp->setName("Test");
        for ($i = 1; $i <= 200; $i++) {
            $product = new Product();
            
            $product
                ->setName('Product ' . $i)
                ->setDecription('Un super objet venant d hokkaido territoire de glace','Une magnifique perruque tirée de l animé naruto', 'un lot de goodies tiré de ta licence favorite ! plusieurs centaines de licences disponibles', 'un artwork format display tirée d une licence parmi plus de 500 disponibles !!!')
                ->setPrice($this->random_float(4, 399))
                ->setStock(mt_rand(10, 600))
                ->setCategory( $this->tempcategory);

            $manager->persist($product);
        }

        $manager->flush();
    }
}
