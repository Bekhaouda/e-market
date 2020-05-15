<?php

namespace App\Controller\Shopping;

use App\Entity\Catalog\Product;
use App\Repository\Catalog\ProductRepository;
use App\Repository\Catalog\CategoryRepository;
use App\Entity\Catalog\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends AbstractController
{
    /**
     * @Route("/products", name="products")
     */
    public function index()
    {

        $categorys = $this->getDoctrine()->getRepository(Category::class)->findAll();
        $products =  $this->getDoctrine()->getRepository(Product::class)->findAll();

        return $this->render('shopping/product/index.html.twig', [

            'categorys'       =>  $categorys,
            'products'        =>  $products,
        ]);
    }


    /**
     * @Route("/product", name="product")
     */
    public function product()
    {
        $categorys = $this->getDoctrine()->getRepository(Category::class)->findAll();
        $products =  $this->getDoctrine()->getRepository(Product::class)->findAll();
        //dd($product);
        return $this->render('shopping/product/index.html.twig', [

            'categorys'       =>  $categorys,
            'products'        =>  $products,
        ]);
    }



    /**
     * @Route("/product/{id}", name="details_product")
     */
    public function showProduct($id)
    {
        $product = $this->getDoctrine()->getRepository(Product::class)->find($id);
        $categorys = $this->getDoctrine()->getRepository(Category::class)->findAll();
        //dd($product);
        return $this->render('Shopping/product/product1.html.twig', [

            'categorys'       =>  $categorys,
            'product' => $product,
        ]);
    }
}
