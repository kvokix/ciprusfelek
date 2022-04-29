<?php
class Product{
    public $id;
    public $name;
    public $price;
    public $quantity;
    public $image;
    public $size;

    public function __construct($id,$name,$price,$quantity,$image,$size){
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->image = $image;
        $this->size = $size;
    }
}
?>