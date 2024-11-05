<?php 

namespace Models;

class Item {

  private $itemId;
  private $itemName;
  private $brand;
  private $model;
  private $stock;
  private $price;
  private $isActive;

  
  public function __construct(
    $itemName = NULL,
    $brand = NULL,
    $model = NULL,
    $stock = 0,
    $price = 0.0,
    $isActive = TRUE
  ) 
  {     
    $this->itemName = $itemName;
    $this->brand = $brand;
    $this->model = $model;
    $this->stock = $stock;
    $this->price = $price;
    $this->isActive = $isActive;
  }


  public function getItemId() {
    return $this->itemId;
  }


  public function setItemId($itemId) {
    $this->itemId = $itemId;
    return $this;
  }


  public function getItemName() {
    return $this->itemName;
  }


  public function setItemName($itemName) {
    $this->itemName = $itemName;
    return $this;
  }


  public function getBrand() {
    return $this->brand;
  }


  public function setBrand($brand) {
    $this->brand = $brand;
    return $this;
  }


  public function getModel() {
    return $this->model;
  }


  public function setModel($model) {
    $this->model = $model;
    return $this;
  }


  public function getStock() {
    return $this->stock;
  }


  public function setStock($stock) {
    $this->stock = $stock;
    return $this;
  }


  public function getPrice() {
    return $this->price;
  }


  public function setPrice($price) {
    $this->price = $price;
    return $this;
  }


  public function getIsActive() {
    return $this->isActive;
  }
  
  
  public function setIsActive($isActive) {
    $this->isActive = $isActive;
    return $this;
  }

}

?>
