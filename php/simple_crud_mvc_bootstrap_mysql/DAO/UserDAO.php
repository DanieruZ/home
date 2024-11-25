<?php 

namespace DAO;

use Models\User as User;
use DAO\Connection as Connection;
use PDO as PDO;

class UserDAO {

  public static function Add(User $user) {
    try {
      $connection = Connection::GetInstance()->getPDO();
      $query = $connection->prepare(
        <<<SQL
          INSERT INTO users (
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
        SQL
      );

      $firstname = $user->getFirstname();
      $lastname = $user->getLastname();
      $email = $user->getEmail();
      $userPass = $user->getUserPass();
      $userType = $user->getUserType();
      $isActive = $user->getIsActive();
      
      $query->bindParam(':firstname', $firstname);
      $query->bindParam(':lastname', $lastname);
      $query->bindParam(':email', $email);
      $query->bindParam(':userPass', $userPass);
      $query->bindParam(':userType', $userType);
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
          FROM users;
        SQL
      );
      
      $query->execute();
      $usersDB = $query->fetchAll(PDO::FETCH_ASSOC);

      $userList = [];

      foreach($usersDB as $user) {
        $userList[] = new User(
          $user['userId'],
          $user['firstname'],
          $user['lastname'],
          $user['email'],
          $user['userPass'],
          $user['userType'],
          $user['isActive']
        );
      }
      return $userList;
    }
    catch(PDOException $e) {
      throw $e;
    }  
  }


  public static function GetByEmail($email) {
    try {
      $connection = Connection::GetInstance()->getPDO();
      $query = $connection->prepare(
        <<<SQL
          SELECT * 
          FROM users
          WHERE email = :email;
        SQL
      );  

      $query->bindParam(':email', $email);  
      $query->execute();
      $userDB = $query->fetch(PDO::FETCH_ASSOC);

      if($userDB) {
        $user = new User(
          $userDB['userId'],
          $userDB['firstname'],
          $userDB['lastname'],
          $userDB['email'],
          $userDB['userPass'],
          $userDB['userType'],
          $userDB['isActive']
        );
      }
      return $user;
    }
    catch(PDOException $e) {
      throw $e;
    }  
  }


  public static function GetById($userId) {
    try {
      $connection = Connection::GetInstance()->getPDO();
      $query = $connection->prepare(
        <<<SQL
          SELECT * 
          FROM users
          WHERE userId = :userId;
        SQL
      );  

      $query->bindParam(':userId', $userId);  
      $query->execute();
      $userDB = $query->fetch(PDO::FETCH_ASSOC);

      if($userDB) {
        $user = new User(
          $userDB['userId'],
          $userDB['firstname'],
          $userDB['lastname'],
          $userDB['email'],
          $userDB['userPass'],
          $userDB['userType'],
          $userDB['isActive']
        );
      }
      return $user;
    }
    catch(PDOException $e) {
      throw $e;
    }  
  }


  public static function Update(User $user) {
    try {
        $connection = Connection::GetInstance()->getPDO();
        $query = $connection->prepare(
          <<<SQL
            UPDATE users
            SET 
              firstname = :firstname, 
              lastname = :lastname, 
              email = :email,
              userPass = :userPass,
              userType = :userType,
              isActive = :isActive
            WHERE userId = :userId;
          SQL
        );

        $userId = $user->getUserId();
        $firstname = $user->getFirstname();
        $lastname = $user->getLastname();
        $email = $user->getEmail();
        $userPass = $user->getUserPass();
        $userType = $user->getUserType();
        $isActive = $user->getIsActive();

        $query->bindParam(':userId', $userId);
        $query->bindParam(':firstname', $firstname);
        $query->bindParam(':lastname', $lastname);
        $query->bindParam(':email', $email);
        $query->bindParam(':userPass', $userPass);
        $query->bindParam(':userType', $userType);
        $query->bindParam(':isActive', $isActive);

        return $query->execute();
    } 
    catch(PDOException $e) {
      throw $e;
    }
  }


  public static function DeleteById($userId) {
    try {
      $connection = Connection::GetInstance()->getPDO();
      $query = $connection->prepare(
        <<<SQL
          DELETE FROM users
          WHERE userId = :userId;
        SQL
      );  

      $query->bindParam(':userId', $userId, PDO::PARAM_INT);
      return $query->execute();
    }
    catch(PDOException $e) {
      throw $e;
    }
  }


  public static function ExistEmail($email) { 
    try {
      $connection = Connection::GetInstance()->getPDO();
      $query = $connection->prepare(
        <<<SQL
          SELECT COUNT(*) AS count 
          FROM users 
          WHERE email = :email;
        SQL
      );  

      $query->bindParam(':email', $email, PDO::PARAM_STR);  
      $query->execute();
      $result = $query->fetch(PDO::FETCH_ASSOC);

      return $result['count'] > 0;
    } 
    catch(PDOException $e) {
      throw $e;
    }
  }
  
}

?>