<?php 

namespace DAO;

use DAO\Connection as Connection;
use DAO\IUserDAO as IUserDAO;
use Models\User as User;


class UserDAO implements IUserDAO {

  private $connection;
  private $tableName = "users";
  private $userList = array();

  
  public function addUser($user) {
    try {
      $query = 
        <<<SQL
          INSERT INTO {$this->tableName} (
            firstname, 
            lastname, 
            email, 
            userPass, 
            userType,
            isActive
          ) 
          VALUES (
            :firstname, 
            :lastname, 
            :email, 
            :userPass,
            :userType,
            :isActive
          );
        SQL;
       
      $parameters["firstname"] = $user->getFirstname();
      $parameters["lastname"]  = $user->getLastname();
      $parameters["email"]     = $user->getEmail();
      $parameters["userPass"]  = $user->getUserPass();
      $parameters["userType"]  = $user->getUserType();
      $parameters["isActive"]  = $user->getIsActive();

      $this->connection = Connection::GetInstance();
      return $this->connection->ExecuteNonQuery($query, $parameters);
    } 
    catch(PDOException $e) {
      throw $e;
    }
  }


  public function getAllUser() {
    try {
      $query =
        <<<SQL
          SELECT *
          FROM {$this->tableName};
        SQL;

      $this->connection = Connection::GetInstance();
      $result = $this->connection->Execute($query);

      foreach($result as $row) {
        $user = new User();
        $user->setUserId($row["userId"]);
        $user->setFirstname($row["firstname"]);
        $user->setLastname($row["lastname"]);
        $user->setEmail($row["email"]);            
        $user->setUserPass($row["userPass"]);
        $user->setUserType($row["userType"]);
        $user->setIsActive($row["isActive"]);

        array_push($this->userList, $user);
      }
      return $this->userList;  
    } 
    catch(PDOException $e) {
      throw $e;
    }
  }


  public function getUserById($userId) {
    try {
      $query = 
        <<<SQL
          SELECT * 
          FROM {$this->tableName} 
          WHERE userId = :userId;
        SQL;  

        $parameters['userId'] = $userId;
        
        $this->connection = Connection::GetInstance();
        $user = $this->connection->Execute($query, $parameters);
      
      foreach($user as $value) {
        $user = new User();
        $user->setUserId($value['userId']);
        $user->setFirstname($value['firstname']);
        $user->setLastname($value['lastname']);
        $user->setEmail($value['email']);
        $user->setUserPass($value['userPass']);
        $user->setUserType($value["userType"]);
        $user->setIsActive($value["isActive"]);
      }
      return $user;
    }
    catch(PDOException $e) {
      throw $e;
    }
  }


  public function getUserByEmail($email) {
    try {
      $query = 
        <<<SQL
          SELECT * 
          FROM {$this->tableName} 
          WHERE email = :email;
        SQL;  
        
        $parameters['email'] = $email;

        $this->connection = Connection::GetInstance();
        $user = $this->connection->Execute($query, $parameters);
      
      foreach($user as $value) {
        $user = new User();
        $user->setUserId($value['userId']);
        $user->setFirstname($value['firstname']);
        $user->setLastname($value['lastname']);
        $user->setEmail($value['email']);
        $user->setUserPass($value['userPass']);
        $user->setUserType($value["userType"]);
        $user->setIsActive($value["isActive"]);
      }
      return $user;
    }
    catch(PDOException $e) {
      throw $e;
    }
  }


  public function updateUser(User $user) {
    try {
      $query = 
        <<<SQL
          UPDATE {$this->tableName}
          SET 
            firstname = :firstname, 
            lastname = :lastname, 
            email = :email,
            userPass = :userPass,
            userType = :userType,
            isActive = :isActive
          WHERE userId = :userId;
        SQL;    

        $parameters["userId"]    = $user->getUserId();
        $parameters["firstname"] = $user->getFirstname();
        $parameters["lastname"]  = $user->getLastname();
        $parameters["email"]     = $user->getEmail();
        $parameters["userPass"]  = $user->getUserPass();
        $parameters["userType"]  = $user->getUserType();
        $parameters["isActive"]  = $user->getIsActive();
  
      $this->connection = Connection::GetInstance();
      return $this->connection->ExecuteNonQuery($query, $parameters);
    }
    catch(PDOException $e) {
      throw $e;
    }
  }


  public function deleteUserById($userId) {
    try {
      $query = 
        <<<SQL
          DELETE FROM {$this->tableName}
          WHERE userId = :userId;
        SQL;

      $parameters['userId'] = $userId;

      $this->connection = Connection::GetInstance();
      return $this->connection->ExecuteNonQuery($query, $parameters);
    }
    catch(PDOException $e) {
      throw $e;
    }
  }


  public function existUserEmail($email) { 
    try {
      $query = 
        <<<SQL
          SELECT COUNT(*) AS count 
          FROM {$this->tableName} 
          WHERE email = :email
          LIMIT 1;
        SQL;  

      $parameters['email'] = $email;  

      $this->connection = Connection::GetInstance();
      $result = $this->connection->Execute($query, $parameters);

      return $result[0]['count'] > 0;
    }
    catch(PDOException $e) {
      throw $e;
    }
  }

}

?>