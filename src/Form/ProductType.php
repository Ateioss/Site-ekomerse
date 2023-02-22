<?php

namespace App\Form;

use App\Entity\Product;
use App\Repository\CategoryRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Category;


class ProductType extends AbstractType
{
    private ManagerRegistry $category;
    public function __construct(ManagerRegistry $doctrine)
    {
      $this->category = $doctrine;
      echo($this->category->getRepository(Category::class)->find('Outillage'));
    }
    private Category $tempcategory;
    // private function getCategory(ManagerRegistry $manager){
    //     $this->category=$manager;
      
    //     echo($this->tempcategory);
        
    // }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add('name')
            ->add('decription')
            ->add('price')
            ->add('picture')
            ->add('stock')
            ->add('Category', ChoiceType::class, [
                'choices'  => [
                    ' Accessoires Vélo' => $this->category->getRepository(Category::class)->findBy(array('name' => 'Accessoires Vélo'),array('name' => 'ASC'),1 ,0)[0],
                    'Vélo' => $this->category->getRepository(Category::class)->findBy(array('name' => 'Vélo'),array('name' => 'ASC'),1 ,0)[0],
                    'Alimentaire' => $this->category->getRepository(Category::class)->findBy(array('name' => 'Alimentaire'),array('name' => 'ASC'),1 ,0)[0],
                    'ÉlectroMénager' => $this->category->getRepository(Category::class)->findBy(array('name' => 'ÉlectroMénager'),array('name' => 'ASC'),1 ,0)[0],
                    'Luminaire' => $this->category->getRepository(Category::class)->findBy(array('name' => 'Luminaire'),array('name' => 'ASC'),1 ,0)[0],
                    'Décorartion' => $this->category->getRepository(Category::class)->findBy(array('name' => 'Décorartion'),array('name' => 'ASC'),1 ,0)[0],
                    'Accesoires maison' => $this->category->getRepository(Category::class)->findBy(array('name' => 'Accesoires maison'),array('name' => 'ASC'),1 ,0)[0],
                    'Outillage' => $this->category->getRepository(Category::class)->findBy(array('name' => 'Outillage'),array('name' => 'ASC'),1 ,0)[0],
                    'Informatique' =>$this->category->getRepository(Category::class)->findBy(array('name' => 'Informatique'),array('name' => 'ASC'),1 ,0)[0]
                ],
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
