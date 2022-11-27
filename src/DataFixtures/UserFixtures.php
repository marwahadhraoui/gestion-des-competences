<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture 
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher){
        $this ->faker = Factory::create('fr_FR');
        $this->hasher = $hasher;
    }
  
    public function load(ObjectManager $manager): void
    {
        $admin1 = new User();
        $admin1->setUsername("admin1");
        $admin1->setPassword($this->hasher->hashPassword($admin1,'admin'));
        $admin1->setRoles(['ROLE_ADMIN']);

        $admin2 = new User();
        $admin2->setUsername("admin2");
        $admin2->setPassword($this->hasher->hashPassword($admin2,'admin'));
        $admin2->setRoles(['ROLE_ADMIN']);

        $manager->persist($admin1);
        $manager->persist($admin2);


        for($i = 0; $i<5 ;$i++) {
            $user = new User();
            $user->setUsername("user$i");
            $user->setPassword($this->hasher->hashPassword($user,'user'));
            $manager->persist($user);


        }

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
