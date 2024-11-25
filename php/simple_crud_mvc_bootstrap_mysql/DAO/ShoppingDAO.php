<?php 

namespace DAO;

use DAO\Connection as Connection;
use Models\Shopping as Shopping;
use Models\Item as Item;
use PDO as PDO;

class ShoppingDAO {

  public static function Add(Shopping $shopping) {
    try {
      $connection = Connection::GetInstance()->getPDO();
      $query = $connection->prepare(
        <<<SQL
          INSERT INTO shopping (
            userId, 
            itemId, 
            quantity, 
            createdAt
          ) 
          VALUES (
            :userId, 
            :itemId, 
            :quantity, 
            :createdAt
          );
        SQL
      ); 

      $userId = $shopping->getUserId();
      $itemId = $shopping->getItemId();
      $quantity = $shopping->getQuantity();
      $createdAt = $shopping->getCreatedAt();

      $query->bindParam(':userId', $userId);
      $query->bindParam(':itemId', $itemId);
      $query->bindParam(':quantity', $quantity);
      $query->bindParam(':createdAt', $createdAt);
 
      $query->execute();
    } 
    catch(PDOException $e) {
      throw $e;
    }
  }


  public static function All() {
    try {
      $connection = Connection::GetInstance()->getPDO();
      $query = $connection->prepare(
        <<<SQL
          SELECT *
          FROM shopping AS s
          INNER JOIN item i ON s.itemId = i.itemId
          INNER JOIN users u ON s.userId = u.userId
          ORDER BY s.createdAt DESC;  
        SQL
      );
  
      $query->execute();
      $result = $query->fetchAll(PDO::FETCH_ASSOC);
  
      $shoppingList = [];
  
      foreach ($result as $row) {
        $shopping = new Shopping();
        $shopping->setShoppingId($row["shoppingId"]);
        $shopping->setUserId($row["userId"]);
        $shopping->setItemId($row["itemId"]);
        $shopping->setQuantity($row["quantity"]);            
        $shopping->setCreatedAt($row["createdAt"]);
  
        $item = new Item();
        $item->setItemName($row["itemName"]);
        $item->setBrand($row["brand"]);
        $item->setModel($row["model"]);
        $item->setPrice($row["price"]);
  
        $shopping->setItem($item);
  
        $shoppingList[] = $shopping;
      }
      return $shoppingList;
    } 
    catch (PDOException $e) {
      throw $e;
    }
  }
  

  public static function GetByUserId($userId) {
    try {
      $connection = Connection::GetInstance()->getPDO();
      $query = $connection->prepare(
        <<<SQL
          SELECT *
          FROM shopping AS s
          INNER JOIN item i ON s.itemId = i.itemId
          INNER JOIN users u ON s.userId = u.userId
          WHERE u.userId = :userId
          ORDER BY s.createdAt DESC; 
        SQL
      );
  
      $query->bindParam(':userId', $userId);
      $query->execute();
      $result = $query->fetchAll(PDO::FETCH_ASSOC);
  
      $shoppingList = [];

      foreach ($result as $row) {
        $shopping = new Shopping();
        $shopping->setShoppingId($row["shoppingId"]);
        $shopping->setUserId($row["userId"]);
        $shopping->setItemId($row["itemId"]);
        $shopping->setQuantity($row["quantity"]);            
        $shopping->setCreatedAt($row["createdAt"]);
  
        $item = new Item();
        $item->setItemName($row["itemName"]);
        $item->setBrand($row["brand"]);
        $item->setModel($row["model"]);
        $item->setPrice($row["price"]);
  
        $shopping->setItem($item);
        $shoppingList[] = $shopping;
      }
      return $shoppingList;  
    } 
    catch(PDOException $e) {
      throw $e;
    }
  } 

}  

?>