<?php

namespace App\Controller\Shopping;

use App\Repository\ProductRepository;
use App\Services\Cart\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    /**
     * @Route("/cart", name="cart")
     */
    public function index(CartService $cartService)
    {

        return $this->render('shopping/cart/index.html.twig', [

            'items' => $cartService->getFullCart(),
            'total' => $cartService->getTotal()

        ]);
    }


    /**
     * @Route("/cart/add/{id}", name="cart_add")
     */
    public function add($id, CartService $cartService)
    {

        $cartService->add($id);

        return $this->redirectToRoute('products');
    }

    /**
     * @Route("/cart/remove/{id}", name="cart_remove")
     */
    public function remove($id, CartService $cartService)
    {

        $cartService->remove($id);


        return $this->redirectToRoute("cart");
    }
    /**
     * @Route("/checkout", name="checkout")
     */
    public function checkout(CartService $cartService)
    {
        return $this->render('Shopping/cart/checkout.html.twig', [
            'controller_name' => 'CartController',
            'items' => $cartService->getFullCart(),
            'total' => $cartService->getTotal(),
        ]);
    }

    /**
     * @Route("payment", name="payment")
     */
    public function payment(CartService $cartService)
    {
        /* return $this->render('Shopping/cart/payment.html.twig', [
            'controller_name' => 'CartController',*/
        //dd($cartService->getFullCart());
        //dd($cartService->getTotal());

        //dd($name);
    }
}
