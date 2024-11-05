<?php 

namespace DAO;

use DAO\Connection as Connection;
use DAO\IShoppingDAO as IShoppingDAO;
use Models\Shopping as Shopping;
use Models\Item as Item;


class ShoppingDAO implements IShoppingDAO {

  private $connection;
  private $tableName = "shopping";
  private $shoppingList = array();


  public function addShopping(Shopping $shopping) {
    try {
      $query = 
        <<<SQL
          INSERT INTO {$this->tableName} (
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
        SQL;
       
      $parameters["userId"] = $shopping->getUserId();
      $parameters["itemId"] = $shopping->getItemId();
      $parameters["quantity"] = $shopping->getQuantity();
      $parameters["createdAt"] = $shopping->getCreatedAt();

      $this->connection = Connection::GetInstance();
      return $this->connection->ExecuteNonQuery($query, $parameters);
    } 
    catch(PDOException $e) {
      throw $e;
    }
  }


  public function getAllShopping() {
    try {
      $query =
        <<<SQL
          SELECT *
          FROM {$this->tableName} AS s
          INNER JOIN item i
            ON s.itemId = i.itemId
          INNER JOIN users u
            ON s.userId = u.userId
          ORDER BY s.createdAt DESC;  
        SQL;

      $this->connection = Connection::GetInstance();
      $result = $this->connection->Execute($query);

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

        array_push($this->shoppingList, $shopping);
      }
      return $this->shoppingList;  
    } 
    catch(PDOException $e) {
      throw $e;
    }
  }


  public function getShoppingByUserId($userId) {
    try {
      $query =
        <<<SQL
          SELECT *
          FROM {$this->tableName} AS s
          INNER JOIN item i
            ON s.itemId = i.itemId
          INNER JOIN users u
            ON s.userId = u.userId
          WHERE u.userId = :userId
          ORDER BY s.createdAt DESC; 
        SQL;

        $parameters['userId'] = $userId;  

      $this->connection = Connection::GetInstance();
      $result = $this->connection->Execute($query, $parameters);

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

        array_push($this->shoppingList, $shopping);
      }
      return $this->shoppingList;  
    } 
    catch(PDOException $e) {
      throw $e;
    }
  }

}  

?>