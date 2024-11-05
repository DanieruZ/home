<?php 

namespace Controllers;

use DAO\UserDAO as UserDAO;
use DAO\ItemDAO as ItemDAO;
use DAO\ShoppingDAO as ShoppingDAO;
use Models\User as User;
use Models\Item as Item;
use Models\Shopping as Shopping;
use Utils\Utils as Utils;

class CustomerController {

  private $user;
  private $userDAO;
  private $userList;
  private $itemDAO;
  private $itemList;
  private $shoppingDAO;
  private $shoppingList;
  

  public function __construct() {
    $this->userDAO = new UserDAO();
    $this->itemDAO = new ItemDAO();
    $this->shoppingDAO = new ShoppingDAO();
  }  

  
  #═════ CUSTOMER VIEWS ═════════════════════════

  public function SignUpView() {   
    require_once(VIEWS_PATH . "signup.php");
  }


  public function ItemListView() {   
    Utils::checkCustomerSession();
    $itemList = $this->itemDAO->getAllItem();
    Utils::displayMessage();
    require_once(VIEWS_PATH . "customer_nav.php");
    require_once(VIEWS_PATH . "modal_shopping_cart.php");
    require_once(VIEWS_PATH . "customer_item_list.php");
    require_once(VIEWS_PATH . "pagination.php");
    require_once(VIEWS_PATH . "modal_stock.php");
  } 


  public function ShoppingListView() {   
    Utils::checkCustomerSession();
    $user = $_SESSION['customer'];
    $userId = $user->getUserId();
    $shoppingList = $this->shoppingDAO->getShoppingByUserId($userId);
    require_once(VIEWS_PATH . "customer_nav.php");
    require_once(VIEWS_PATH . "customer_shopping_list.php");
    require_once(VIEWS_PATH . "pagination.php");
  } 


  public function ProfileView() {
    Utils::checkCustomerSession();
    $user = $_SESSION['customer'];
    $userId = $user->getUserId();
    require_once(VIEWS_PATH . "customer_nav.php");
    require_once(VIEWS_PATH . "customer_profile.php");
    Utils::displayMessage();
  }


  public function UpdateProfileView() {  
    Utils::checkCustomerSession();
    $user = $_SESSION['customer'];
    $userId = $user->getUserId();
    require_once(VIEWS_PATH . "customer_nav.php");
    require_once(VIEWS_PATH . "customer_profile_update.php");
  }


  #═════ CUSTOMER ACTIONS ═════════════════════════

  public function SignUp(
    $firstname, 
    $lastname, 
    $email, 
    $userPass) {  
    
    $existingUser = $this->userDAO->existUserEmail($email);

    if(!$existingUser) {
      $user = new User();   
      $user->setFirstname($firstname);
      $user->setLastname($lastname);
      $user->setEmail($email);
      $user->setUserPass(!empty($userPass) ? $userPass : '123');
      $user->setUserType('customer');
      $user->setIsActive(TRUE); 
    
      $this->userDAO->addUser($user);   
      
      $_SESSION['message'] = "Registered successfully! <br>Sign in & enjoy.";
      $_SESSION['message_type'] = "Success"; 
      
      header("location: ../index.php");
      exit();
    }
    else {
      $_SESSION['message'] = "Registered email!";
      $_SESSION['message_type'] = "Error";
      
      header("location: ../index.php");
      exit();
    }  
  }


  public function AddShopping($itemId, $quantity) {
    $user = $_SESSION['customer'];
    $userId = $user->getUserId();

    $shopping = new Shopping();
    $shopping->setUserId($userId);
    $shopping->setItemId($itemId);
    $shopping->setQuantity($quantity);
    $shopping->setCreatedAt(date('Y-m-d H:i:s'));

    $this->shoppingDAO->addShopping($shopping);
  }


  public function UpdateProfile(
    $userId,
    $firstname, 
    $lastname,
    $email,
    $userPass) {

    $currentUser = $this->userDAO->getUserById($userId);
    
    if($currentUser) {
      $user = new User();   
      $user->setUserId($userId);
      $user->setFirstname($firstname);
      $user->setLastname($lastname);
      $user->setEmail($email);
      $user->setUserType($currentUser->getUserType());
      $user->setUserPass(!empty($userPass) ? $userPass : $currentUser->getUserPass());
      $user->setIsActive($currentUser->getIsActive()); 

      $this->userDAO->updateUser($user);

      $_SESSION['message'] = "Updated successfully! <br>You must restart session.";
      $_SESSION['message_type'] = "Success"; 

      header("location: ../Customer/ProfileView");
      exit();
    } 
    else {
      $_SESSION['message'] = "Failed to update!";
      $_SESSION['message_type'] = "Error";

      header("location: ../Customer/ProfileView");
      exit(); 
    }
  }


  public function CreatePurchase($items) {
    $user = $_SESSION['customer'];
    $userId = $user->getUserId();

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      if(isset($_POST['items'])) {
        $items = json_decode($_POST['items'], TRUE);

        if(is_array($items)) {
          $purchaseSuccessful = TRUE;

          foreach($items as $item) {
            $itemId = $item['itemId'];
            $quantity = $item['quantity'];
                    
            $this->AddShopping($itemId, $quantity);
            $this->itemDAO->updateStock($itemId, $quantity);
          }
          
          if($purchaseSuccessful) {
            $_SESSION['message'] = "Purchase successfully completed.";
            $_SESSION['message_type'] = "Success";
          }
        }
        else {
          $_SESSION['message'] = "Couldn't decode items";
          $_SESSION['message_type'] = "Error";
        }
      }
      else {
        $_SESSION['message'] = "No items were received.";
        $_SESSION['message_type'] = "Error";
      }
      header("Location: ../Customer/ItemListView");
      exit();
    }
  }
  
  
  public function Logout() {
    Utils::logout();
  }
  
}

?>