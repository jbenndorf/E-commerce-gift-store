<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $categoryBeauty = new Category();
        $categoryBeauty->setTitle('Beauty');
        $manager->persist($categoryBeauty);

        $categoryHome = new Category();
        $categoryHome->setTitle('Home');
        $manager->persist($categoryHome);

        $categoryFood = new Category();
        $categoryFood->setTitle('Eat and Drink');
        $manager->persist($categoryFood);

        $manager->flush();

        //Setting references
        $this->setReference('Beauty', $categoryBeauty);
        $this->setReference('Home', $categoryHome);
        $this->setReference('Food', $categoryFood);
    }
}
