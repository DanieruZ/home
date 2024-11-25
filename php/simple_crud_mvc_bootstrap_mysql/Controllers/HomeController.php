<?php
    
namespace Controllers;

use Models\User as User;
use Models\Item as Item;
use DAO\UserDAO as UserDAO;
use DAO\ItemDAO as ItemDAO;
use Utils\Utils as Utils;

class HomeController {

  public function __construct() {}     

  
  public function Index() {
    $itemList = ItemDAO::All();
    require_once(VIEWS_PATH . "welcome.php");
    require_once(VIEWS_PATH . "pagination.php");
    Utils::DisplayMessage();
  }


  public function LoginView() {
    require_once(VIEWS_PATH . "login.php");
  }


  public function SignIn() {
    try {
      if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'] ?? '';
        $userPass = $_POST['userPass'] ?? '';
        
        $user = UserDAO::GetByEmail($email);

        if($user) {
          if(!$user->getIsActive()) {
            $_SESSION['message'] = "Your account has been suspended!";
            $_SESSION['message_type'] = "Error"; 
            header("location: index.php");
            exit();
          }

          if($user->getUserPass() === $userPass) {
            $_SESSION['userType'] = $user->getUserType();
            $_SESSION['message'] = "Welcome " . $user->getFirstname() . "!";
            $_SESSION['message_type'] = "Success"; 

            if($user->getUserType() === 'admin') {
              $_SESSION['admin'] = $user;
              header("Location: ?controller=Admin&action=UserListView");
            } 
            else {
              $_SESSION['customer'] = $user;
              header("Location: ?controller=Customer&action=ItemListView");
            }
            exit();
          } 
          else {
            $_SESSION['message'] = "Wrong email or password. Try again!";
            $_SESSION['message_type'] = "Error"; 
            header("location: index.php");
            exit();
          }
        } 
        else {
          $_SESSION['message'] = "Wrong email or password. Try again!";
          $_SESSION['message_type'] = "Error"; 
          header("location: index.php");
          exit();
        }
      }
    } 
    catch(PDOException $e) {
      throw $e;
    }
  }    

}

?>