<?php 

namespace DAO;

use DAO\Connection as Connection;
use DAO\IItemDAO as IItemDAO;
use Models\Item as Item;


class ItemDAO implements IItemDAO {

  private $connection;
  private $tableName = "item";
  private $itemList = array();


  public function addItem(Item $item) {
    try {
      $query = 
        <<<SQL
          INSERT INTO {$this->tableName} (
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
        SQL;
       
      $parameters["itemName"] = $item->getItemName();
      $parameters["brand"] = $item->getBrand();
      $parameters["model"] = $item->getModel();
      $parameters["stock"] = $item->getStock();
      $parameters["price"] = $item->getPrice();
      $parameters["isActive"] = $item->getIsActive();

      $this->connection = Connection::GetInstance();
      return $this->connection->ExecuteNonQuery($query, $parameters);
    } 
    catch(PDOException $e) {
      throw $e;
    }
  }


  public function getAllItem() {
    try {
      $query =
        <<<SQL
          SELECT *
          FROM {$this->tableName};
        SQL;

      $this->connection = Connection::GetInstance();
      $result = $this->connection->Execute($query);

      foreach ($result as $row) {
        $item = new Item();
        $item->setItemId($row["itemId"]);
        $item->setItemName($row["itemName"]);
        $item->setBrand($row["brand"]);
        $item->setModel($row["model"]);            
        $item->setStock($row["stock"]);
        $item->setPrice($row["price"]);
        $item->setIsActive($row["isActive"]);

        array_push($this->itemList, $item);
      }
      return $this->itemList;  
    } 
    catch(PDOException $e) {
      throw $e;
    }
  }


  public function existItemName($itemName) {
    try {
      $query = 
        <<<SQL
          SELECT COUNT(*) AS count 
          FROM {$this->tableName} 
          WHERE itemName = :itemName
          LIMIT 1;
        SQL;  

      $parameters['itemName'] = $itemName;  

      $this->connection = Connection::GetInstance();
      $result = $this->connection->Execute($query, $parameters);

      return $result[0]['count'] > 0;
    } 
    catch(PDOException $e) {
      throw $e;
    }
  }


  public function getItemById($itemId) {
    try {
      $query = 
        <<<SQL
          SELECT * 
          FROM {$this->tableName} 
          WHERE itemId = :itemId;
        SQL;  

      $parameters['itemId'] = $itemId;  

      $this->connection = Connection::GetInstance();
      $item = $this->connection->Execute($query, $parameters);

      foreach ($item as $value) {
        $item = new Item();
        $item->setItemId($value['itemId']);
        $item->setItemName($value['itemName']);
        $item->setBrand($value['brand']);
        $item->setModel($value['model']);
        $item->setStock($value['stock']);
        $item->setPrice($value['price']);  
        $item->setIsActive($value["isActive"]);  
      }
      return $item;
    }
    catch(PDOException $e) {
      throw $e;
    }
  }


  public function getStock($itemId) {
    try {
      $query = 
        <<<SQL
          SELECT stock 
          FROM {$this->tableName} 
          WHERE itemId = :itemId
        SQL;

      $parameters['itemId'] = $itemId;

      $this->connection = Connection::GetInstance();
      $result = $this->connection->Execute($query, $parameters);

      return $result[0]['stock'] ?? 0;
    }
    catch(PDOException $e) {
      throw $e;
    }
  }


  public function updateItem(Item $item) {
    try {
      $query = 
        <<<SQL
          UPDATE {$this->tableName}
          SET 
            itemName = :itemName, 
            brand = :brand, 
            model = :model,
            stock = :stock,
            price = :price,
            isActive = :isActive
          WHERE itemId = :itemId;
        SQL;    

      $parameters['itemId'] = $item->getItemId();
      $parameters['itemName'] = $item->getItemName();
      $parameters['brand'] = $item->getBrand();
      $parameters['model'] = $item->getModel();
      $parameters['stock'] = $item->getStock();
      $parameters['price'] = $item->getPrice();
      $parameters['isActive'] = $item->getIsActive();
      
  
      $this->connection = Connection::GetInstance();
      return $this->connection->ExecuteNonQuery($query, $parameters);
    }
    catch (PDOException $e) {
      throw $e;
    }
  }


  public function updateStock($itemId, $quantity) {
    try {
      $query = 
        <<<SQL
          UPDATE {$this->tableName} 
          SET stock = stock - :quantity 
          WHERE itemId = :itemId 
            AND stock >= :quantity;
        SQL;

      $parameters['itemId'] = $itemId;
      $parameters['quantity'] = $quantity;

      $this->connection = Connection::GetInstance();
      return $this->connection->ExecuteNonQuery($query, $parameters);
    }
    catch(PDOException $e) {
      throw $e;
    }
  }


  public function deleteItemById($itemId) {
    try {
      $query = 
      <<<SQL
        DELETE FROM {$this->tableName}
        WHERE itemId = :itemId;
      SQL;

      $parameters['itemId'] = $itemId;

      $this->connection = Connection::getInstance();
      return $this->connection->executeNonQuery($query, $parameters);
    }
    catch(PDOException $e) {
      throw $e;
    }
  }

}

?>