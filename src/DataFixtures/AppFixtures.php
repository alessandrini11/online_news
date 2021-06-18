<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $users = [];
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 2 ; $i++){
            $user = new User();
            $user->setNom($faker->name)
                ->setPseudo($faker->date)
                ->setPassword("loolool");
            $manager->persist($manager);
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
