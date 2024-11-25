<?php 

namespace Models;

class Shopping {

  private $shoppingId;
  private $userId;
  private $itemId;
  private $quantity;
  private $createdAt;
  private $item;

  
  public function __construct(
    $userId = NULL, 
    $itemId = NULL, 
    $quantity = NULL, 
    $createdAt = NULL
  ) 
  {
    $this->setUserId($userId);
    $this->setItemId($itemId);
    $this->setQuantity($quantity);
    $this->setCreatedAt($createdAt ? $createdAt : date('Y-m-d H:i:s'));
  }


  public function getShoppingId() {
    return $this->shoppingId;
  }


  public function setShoppingId($shoppingId) {
    $this->shoppingId = $shoppingId;
    return $this;
  }

  
  public function getUserId() {
    return $this->userId;
  }


  public function setUserId($userId) {
    $this->userId = $userId;
    return $this;
  }


  public function getItemId() {
    return $this->itemId;
  }

  
  public function setItemId($itemId) {
    $this->itemId = $itemId;
    return $this;
  }


  public function getQuantity() {
    return $this->quantity;
  }


  public function setQuantity($quantity) {
    $this->quantity = $quantity;
    return $this;
  }


  public function getCreatedAt() {
    return $this->createdAt;
  }


  public function setCreatedAt($createdAt) {
    $this->createdAt = $createdAt;
    return $this;
  }


  public function setItem($item) {
    $this->item = $item;
  } 

  public function getItem() {
    return $this->item;
  }

}

?>