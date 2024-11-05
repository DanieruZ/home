<?php
    
namespace Controllers;

use DAO\UserDAO as UserDAO;
use DAO\ItemDAO as ItemDAO;
use Models\User as User;
use Models\Item as Item;
use Utils\Utils as Utils;

class HomeController {

  private $user;
  private $userDAO;
  private $itemDAO;
  private $itemList;


  public function __construct() {
    $this->userDAO = new UserDAO();
    $this->itemDAO = new ItemDAO();
  }
        

  public function Index() {
    $itemDAO = new ItemDAO();
    $itemList = $itemDAO->getAllItem();
    require_once(VIEWS_PATH . "welcome.php");
    Utils::displayMessage();
  }


  public function Login($email, $userPass) {
    $user = $this->userDAO->getUserByEmail($email);
    
    try {
      if($user) {
        if(!$user->getIsActive()) {
          $_SESSION['message'] = "Your account has been suspended!";
          $_SESSION['message_type'] = "Error"; 
          header("location: ../index.php");
          exit();
        }

        if($user->getUserPass() == $userPass) {
          $_SESSION['userType'] = $user->getUserType();
          $_SESSION['message'] = "Welcome " . $user->getfirstname() . "!";
          $_SESSION['message_type'] = "Success"; 

          if($user->getUserType() === 'admin') {
            $_SESSION['admin'] = $user;
            header("location: ../Admin/ItemListView");
          }
          else {
            $_SESSION['customer'] = $user;
            header("location: ../Customer/ItemListView");
          }
          exit();
        }
        else {
          $_SESSION['message'] = "Wrong email or password. Try again!";
          $_SESSION['message_type'] = "Error"; 
          header("location: ../index.php");
          exit();
        }
      }
      else {
        $_SESSION['message'] = "Wrong email or password. Try again!";
        $_SESSION['message_type'] = "Error"; 
        header("location: ../index.php");
        exit();
      }
    }
    catch(PDOException $e) {
      throw $e;
    }
  }


}

?>