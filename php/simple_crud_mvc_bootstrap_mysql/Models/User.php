<?php 

namespace Models;

class User {

  private $userId;
  private $firstname;
  private $lastname;
  private $email;
  private $userPass;
  private $userType;
  private $isActive;

  public function __construct(
    $userId = NULL,
    $firstname = NULL,
    $lastname = NULL,
    $email = NULL,
    $userPass = NULL,
    $userType = NULL,
    $isActive = TRUE
  ) 
  {
    $this->setUserId($userId); 
    $this->setFirstname($firstname);
    $this->setLastname($lastname);
    $this->setEmail($email);
    $this->setUserPass($userPass);
    $this->setUserType($userType);
    $this->setIsActive($isActive);
  }


  public function getUserId() {
    return $this->userId;
  }


  public function setUserId($userId) {
    $this->userId = $userId;
    return $this;
  }


  public function getFirstname() {
    return $this->firstname;
  }


  public function setFirstname($firstname) {
    $this->firstname = $firstname;
    return $this;
  }


  public function getLastname() {
    return $this->lastname;
  }


  public function setLastname($lastname) {
    $this->lastname = $lastname;
    return $this;
  }


  public function getEmail() {
    return $this->email;
  }


  public function setEmail($email) {
    $this->email = $email;
    return $this;
  }


  public function getUserPass() {
    return $this->userPass;
  }


  public function setUserPass($userPass) {
    $this->userPass = $userPass;
    return $this;
  }
  
  public function getUserType() {
    return $this->userType;
  }
  
  
  public function setUserType($userType) {
    $this->userType = $userType;
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