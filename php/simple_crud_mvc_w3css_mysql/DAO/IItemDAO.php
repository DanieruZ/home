<?php

namespace DAO;

use Models\Item as Item;;

interface IItemDAO {

  public function addItem(Item $item);
  public function getAllItem();
  public function getItemById($itemId);
  public function getStock($itemId);
  public function updateItem(Item $item);
  public function updateStock($itemId, $quantity);
  public function deleteItemById($itemId);
  public function existItemName($itemName);
} 

?>