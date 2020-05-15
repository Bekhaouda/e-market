<?php

namespace App\Controller\Shopping;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Catalog\Product;
use App\Repository\Catalog\ProductRepository;
use App\Entity\Catalog\Category;
use App\Repository\Catalog\CategoryRepository;



class StoreController extends AbstractController
{
    /**
     * @Route("/store", name="store")
     */


    public function index()
    {
        $categorys = $this->getDoctrine()->getRepository(Category::class)->findAll();
               
        $products = $this->getDoctrine()->getRepository(Product::class)->findAll();
     
        
        
        return $this->render('shopping/store/index.html.twig', [
            'controller_name' => 'StoreController',
            'categorys' => $categorys,
            'products' => $products,

        ]);
    }
}
