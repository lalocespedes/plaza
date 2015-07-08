<?php

namespace lalocespedes\Cart;

use Cart\Cart;
use Cart\Storage\SessionStore;
use Cart\CartItem;

class PlazaCart
{

  public $cart;
  
  public function __construct()
  {

    $cart = new Cart('cart-02', new SessionStore());
    
    $this->cart = $cart;

    //dont know for what can i use getStore
    //if($this->cart->getStore()->get('cart-02') != false)
    (empty($_SESSION['cart-02'])) ? $this->cart->save() : $this->cart->restore();

  }

  public function insert($data)
  {
    $item = new CartItem;

    foreach($data as $key => $value)
    {
      $item->$key = $value;
    }

    $this->cart->add($item);
    
    $this->cart->save();
  }

  public function findItemId($key)
  {
    return $this->cart->all()[$key]->getId();
  }
  
  public function __call($method, $params)
  {
    $result = call_user_func_array(array($this->cart, $method), $params);
    
    $this->cart->save();
    
    return $result;
  }

}
