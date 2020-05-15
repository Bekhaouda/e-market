<?php

namespace App\Controller\Shopping;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Catalog\Category;
use App\Repository\Catalog\CategoryRepository;
use App\Entity\Catalog\Product;
use App\Repository\Catalog\ProductRepository;
use App\Entity\Catalog\Photo;
use App\Repository\Catalog\PhotoRepository;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category", name="category")
     */
    public function index()
    {
        $categorys = $this->getDoctrine()->getRepository(Category::class)->findAll();
        $products =  $this->getDoctrine()->getRepository(Product::class)->findAll();
                             
       return $this->render('shopping/category/index.html.twig', [
          'controller_name' => 'CategoryController',
           'categorys'       => $categorys, 
           'products'       =>  $products, 
          ]); 
    }

    /**
     * @Route("/category/{id}", name="products_category")
     */
    public function produtsCategory(string $id)
    {
        
         $categorie = $this->getDoctrine()->getRepository(Category::class)->find($id);
         $categorys = $this->getDoctrine()->getRepository(Category::class)->findAll();
         
               
        return $this->render('Shopping/category/productsByCategory.html.twig', [
           'categorys' =>  $categorys,
           'categorie' =>  $categorie,
        ]);  
    }



}
