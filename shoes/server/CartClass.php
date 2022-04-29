<?php
class Cart{
    public $cart=[];

    public function __construct(){
        $this->cart=isset($_SESSION['cart']) ? $_SESSION['cart'] : NULL;
    }
    public function addToCart($product){
         $id=intval($product['id']);
         $size=intval($product['size']);
         $oldQty=0;
         if($this->cart!=NULL){
             foreach($this->cart as $key=>$arr){
                 if(intval($arr['id'])==$id && intval($arr['size']==$size)){
                    $oldQty=intval($arr['quantity']);

                    unset($this->cart[$key]);
                 }
             }
         }
         $product['quantity']+=$oldQty;
             $this->cart[]=$product;
             $_SESSION['cart'] = $this->cart;
        return true;
    }
    public function getQuantity(){
        $toQty=0;
        foreach($this-> cart as $cartItem){
            $toQty += $cartItem['quantity'];
        }
        return $toQty;
    }
    public function remove($id,$size){ 
        foreach($this->cart as $key=>$arr)
         if(intval($arr['id'])==intval($id) && intval($arr['size']==$size))
                unset($this->cart[$key]);
                
        $_SESSION['cart'] = $this->cart; 
        return TRUE; 
     }
 
     public function updateQuantity($id,$quantity,$size){ 
         foreach($this->cart as $key=>&$arr)
              if(intval($arr['id'])==intval($id) && intval($arr['size']==$size))
                 if(intval($quantity)==0)
                     unset($this->cart[$key]);
                 else
                     $arr['quantity']=intval($quantity);
         $_SESSION['cart'] = $this->cart; 
         return TRUE; 
      } 


}
