<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->hasher = $passwordHasher;
    }
    public function load(ObjectManager $manager, ): void
    {
      
        for ($i = 1; $i <= 50; $i++) {
            $user = new User();
            $plaintextPassword = "123456";
            $hashedPassword = $this->hasher->hashPassword(
                $user,
                $plaintextPassword
            );
            $user
                ->setEmail('test'.$i.'@test.fr')
                ->setFirstname('Prenom')
                ->setLastname('Nom')
                ->setPhone('phone')
                ->setPassword($hashedPassword);

            $manager->persist($user);
        }

        $manager->flush();
    }
}
