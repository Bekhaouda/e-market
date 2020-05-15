<?php
namespace App\Services\Cart;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Repository\Catalog\ProductRepository;

class CartService
{
  protected $session;

  public function __construct(SessionInterface $session, ProductRepository $productRepository)
  {
       $this->session = $session; 
       $this->productRepository = $productRepository;
  }
  
  public function add(int $id)
  {


    $panier = $this->session->get('panier',[]);

        if(empty($panier[$id])){
            $panier[$id]=1;
        }else{
            $panier[$id]++;
        }
        
        $this->session->set('panier', $panier);
      
  }
  public function remove(int $id)
  {
      // $session = $request->getSession();
        
      $panier = $this->session->get('panier',[]);

      if(!empty($panier[$id])){
          unset($panier[$id]);
      }
      
      $this->session->set('panier', $panier);
      //dd($session->get('panier'));
      
  }
  
  public function getFullCart() : array
  {
      
        $panier = $this->session->get('panier',[]);
        $panierData = [];
        
        foreach( $panier as $id => $quantity)
        {
            $panierData[]=[
                'product'=> $this->productRepository->find($id),
                'quantity'=> $quantity

            ];
   
        }
      return $panierData; 
  }
  public function getTotal() : float
  {
    $total =0;
    
    foreach($this->getFullCart() as $item)
    {
        $totalItem = $item['product']->getPrice() * $item['quantity'];
        $total += $totalItem;
    }
    return $total;
  }



}