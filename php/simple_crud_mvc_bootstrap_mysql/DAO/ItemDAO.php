<?php 

namespace DAO;

use Models\Item as Item;
use DAO\Connection as Connection;
use PDO as PDO;

class ItemDAO {

  public static function Add(Item $item) {
    try {
      $connection = Connection::GetInstance()->getPDO();
      $query = $connection->prepare(
        <<<SQL
          INSERT INTO item (
            itemName, 
            brand, 
            model, 
            stock, 
            price,
            isActive
          ) 
          VALUES (
            :itemName, 
            :brand, 
            :model, 
            :stock, 
            :price,
            :isActive
          );
        SQL
      );
       
      $itemName = $item->getItemName();
      $brand = $item->getBrand();
      $model = $item->getModel();
      $stock = $item->getStock();
      $price = $item->getPrice();
      $isActive = $item->getIsActive();

      $query->bindParam(':itemName', $itemName);
      $query->bindParam(':brand', $brand);
      $query->bindParam(':model', $model);
      $query->bindParam(':stock', $stock);
      $query->bindParam(':price', $price);
      $query->bindParam(':isActive', $isActive);

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
          FROM item;
        SQL
      );

      $query->execute();
      
      $itemList = [];

      foreach($query->fetchAll(PDO::FETCH_ASSOC) as $item) {
        $itemList[] = new Item(
          $item['itemId'],
          $item['itemName'],
          $item['brand'],
          $item['model'],
          $item['stock'],
          $item['price'],
          $item['isActive']
        );
      }
      return $itemList;
    } 
    catch(PDOException $e) {
       throw $e;
    }
  }


  public static function ExistModel($model) {
    try {
      $connection = Connection::GetInstance()->getPDO();
      $query = $connection->prepare( 
        <<<SQL
          SELECT COUNT(*) AS count 
          FROM item
          WHERE model = :model;
        SQL
      );  

      $query->bindParam(':model', $model, PDO::PARAM_STR);  
      $query->execute();
      $result = $query->fetch(PDO::FETCH_ASSOC);

      return $result['count'] > 0;
    } 
    catch(PDOException $e) {
      throw $e;
    }
  }


  public static function GetById($itemId) {
    try {
      $connection = Connection::GetInstance()->getPDO();
      $query = $connection->prepare( 
        <<<SQL
          SELECT * 
          FROM item
          WHERE itemId = :itemId;
        SQL
      );  

      $query->bindParam(':itemId', $itemId);  
      $query->execute();
      $itemDB = $query->fetch(PDO::FETCH_ASSOC);

      if($itemDB) {
        $item = new Item(
        $itemDB['itemId'],
        $itemDB['itemName'],
        $itemDB['brand'],
        $itemDB['model'],
        $itemDB['stock'],
        $itemDB['price'], 
        $itemDB["isActive"]
        );  
      }
      return $item;
    }
    catch(PDOException $e) {
      throw $e;
    }
  }


  public static function GetStock($itemId) {
    try {
      $connection = Connection::GetInstance()->getPDO();
      $query = $connection->prepare( 
        <<<SQL
          SELECT stock 
          FROM item
          WHERE itemId = :itemId;
        SQL
      );

      $query->bindParam(':itemId', $itemId);  
      $query->execute();
      $result = $query->fetch(PDO::FETCH_ASSOC);

      return $result['stock'] ?? 0;
    }
    catch(PDOException $e) {
      throw $e;
    }
  }


  public static function Update(Item $item) {
    try {
      $connection = Connection::GetInstance()->getPDO();
      $query = $connection->prepare( 
        <<<SQL
          UPDATE item
          SET 
            itemName = :itemName, 
            brand = :brand, 
            model = :model,
            stock = :stock,
            price = :price,
            isActive = :isActive
          WHERE itemId = :itemId;
        SQL
      );    

      $itemId = $item->getItemId();
      $itemName = $item->getItemName();
      $brand = $item->getBrand();
      $model = $item->getModel();
      $stock = $item->getStock();
      $price = $item->getPrice();
      $isActive = $item->getIsActive();
  
      $query->bindParam(':itemId', $itemId);
      $query->bindParam(':itemName', $itemName);
      $query->bindParam(':brand', $brand);
      $query->bindParam(':model', $model);
      $query->bindParam(':stock', $stock);
      $query->bindParam(':price', $price);
      $query->bindParam(':isActive', $isActive);
  
      return $query->execute();
    }
    catch (PDOException $e) {
      throw $e;
    }
  }


  public static function UpdateStock($itemId, $quantity) {
    try {
      $connection = Connection::GetInstance()->getPDO();
      $query = $connection->prepare( 
        <<<SQL
          UPDATE item
          SET stock = stock - :quantity 
          WHERE itemId = :itemId 
            AND stock >= :quantity;
        SQL
      );
      
      $query->bindParam(':itemId', $itemId);
      $query->bindParam(':quantity', $quantity);

      return $query->execute();
    }
    catch(PDOException $e) {
      throw $e;
    }
  }


  public static function DeleteById($itemId) {
    try {
      $connection = Connection::GetInstance()->getPDO();
      $query = $connection->prepare(
        <<<SQL
          DELETE FROM item
          WHERE itemId = :itemId;
        SQL
      );

      $query->bindParam(':itemId', $itemId, PDO::PARAM_INT);
      return $query->execute();
    }
    catch(PDOException $e) {
      throw $e;
    }
  }

}

?>