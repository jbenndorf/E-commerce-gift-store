<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProductFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        //Retrieving References
        $categoryBeauty = $this->getReference('Beauty');
        $categoryHome = $this->getReference('Home');
        $categoryFood = $this->getReference('Food');

        //Beauty Category
        $productSoap = new Product();
        $productSoap->setTitle("Eco Lavender Soap")
                    ->setPrice(4.00)
                    ->setImage("https://media.bookblock.com/shop/2020/12/02171718/Bookblock-Pamper-wool-felted-soap-grey-main.jpg")
                    ->setCategory($categoryBeauty);
        $manager->persist($productSoap);

        $productCream = new Product();
        $productCream->setTitle("Hibiscus Hand Cream")
                    ->setPrice(7.50)
                    ->setImage("https://media.bookblock.com/shop/2020/05/14085229/Milk-Kefirli-Bentonite-Clay-Hibiscus-main.jpg")
                    ->setCategory($categoryBeauty);
        $manager->persist($productCream);

        //Home Category
        $productFlowers = new Product();
        $productFlowers->setTitle("Lavender Flower Arrangement")
                ->setPrice(5.50)
                ->setImage("https://media.bookblock.com/shop/2020/07/06122120/Dried-Flowers-lavender-version2-main.jpg")
                ->setCategory($categoryHome);
        $manager->persist($productFlowers);

        $productTea = new Product();
        $productTea->setTitle("Tea Infuser Ball")
            ->setPrice(6.50)
            ->setImage("https://media.bookblock.com/shop/2021/03/23131606/Bookblock-gold-tea-ball-infuser-main.jpg")
            ->setCategory($categoryHome);
        $manager->persist($productTea);

        $productMug = new Product();
        $productMug->setTitle("White Ceramic Mug")
            ->setPrice(8.00)
            ->setImage("https://media.bookblock.com/shop/2020/05/20104102/Pascal-Ceramic-Mug-White-main.jpg")
            ->setCategory($categoryHome);
        $manager->persist($productMug);

        $productSucculent = new Product();
        $productSucculent->setTitle("Succulent with Pot")
            ->setPrice(11.00)
            ->setImage("https://media.bookblock.com/shop/2020/11/12085430/Bookblock-succulent-orange-main.jpg")
            ->setCategory($categoryHome);
        $manager->persist($productSucculent);

        // Food Category
        $productPralines = new Product();
        $productPralines->setTitle("Mixed Pralines Chocolates")
            ->setPrice(14.00)
            ->setImage("https://media.bookblock.com/shop/2021/03/05175115/15-Praline_1.jpg")
            ->setCategory($categoryFood);
        $manager->persist($productPralines);

        $productGin = new Product();
        $productGin->setTitle("Pink Gin 20cl")
            ->setPrice(19.00)
            ->setImage("https://media.bookblock.com/shop/2020/05/09111538/Forty-liquors-Wild-Pink-Gin-200ml-main.jpg")
            ->setCategory($categoryFood);
        $manager->persist($productGin);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
          CategoryFixtures::class,
        ];
    }
}
