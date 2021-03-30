<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/products", name="app_products")
     */
    public function displayProducts(EntityManagerInterface $em)
    {
        $repository = $em -> getRepository(Product::class);
        $products = $repository -> findAll();
       return $this->render('products.html.twig', [
           'products' => $products
       ]);
    }

    /**
     * @Route("/products/{title}", name="app_product/{title}")
     * @param $title
     * @return Response
     */
    public function displayProductByTitle($title, EntityManagerInterface $em)
    {
        $repository = $em -> getRepository(Product::class);
        $product = $repository -> findOneBy(['title' => $title]);
        return $this->render('products.html.twig', [
            'products' => [$product]
        ]);
    }
}
