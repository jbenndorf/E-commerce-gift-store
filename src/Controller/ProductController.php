<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Cache\CacheInterface;

class ProductController extends AbstractController
{

    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $em){
        $this -> em = $em;
    }

    /**
     * @Route("/products", name="app_products")
     */
    public function displayProducts()
    {
        $repository = $this -> em -> getRepository(Product::class);
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
    public function displayProductByTitle($title, CacheInterface $cache)
    {
        $repository = $this -> em -> getRepository(Product::class);
        $product = $cache -> get($title, function() use ($repository, $title) {
            return $repository -> findOneBy(['title' => $title]);
        });
        return $this->render('products.html.twig', [
            'products' => [$product]
        ]);
    }
}
