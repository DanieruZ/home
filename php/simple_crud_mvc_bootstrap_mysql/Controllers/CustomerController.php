<?php 

namespace Controllers;

use Models\User as User;
use Models\Item as Item;
use Models\Shopping as Shopping;
use DAO\UserDAO as UserDAO;
use DAO\ItemDAO as ItemDAO;
use DAO\ShoppingDAO as ShoppingDAO;
use Utils\Utils as Utils;

class CustomerController {

  public function __construct() {}

  #═════ Customer Views ═════════════════════════

  public function SignUpView() {   
    require_once(VIEWS_PATH . "Customer/signup.php");
  }


  public function ItemListView() {
    Utils::CheckUserSession();
    $itemList = ItemDAO::All();
    require_once(VIEWS_PATH . "Customer/navbar.php");
    require_once(VIEWS_PATH . "modal_shopping_cart.php");
    require_once(VIEWS_PATH . "Customer/item_list.php");
    require_once(VIEWS_PATH . "pagination.php");
    require_once(VIEWS_PATH . "modal_stock.php");
    Utils::DisplayMessage();
  }


  public function ShoppingListView() {   
    Utils::CheckUserSession();
    $user = $_SESSION['customer'];
    $userId = $user->getUserId();
    $shoppingList = ShoppingDAO::GetByUserId($userId);
    require_once(VIEWS_PATH . "Customer/navbar.php");
    require_once(VIEWS_PATH . "Customer/shopping_list.php");
    require_once(VIEWS_PATH . "pagination.php");
  } 


  public function ProfileView() {
    $user = $_SESSION['customer'];
    $userId = $user->getUserId();
    require_once(VIEWS_PATH . "Customer/navbar.php");
    require_once(VIEWS_PATH . "Customer/profile.php");
    Utils::DisplayMessage();
  }


  public function UpdateProfileView() {  
    Utils::CheckUserSession();
    $user = $_SESSION['customer'];
    $userId = $user->getUserId();
    require_once(VIEWS_PATH . "Customer/navbar.php");
    require_once(VIEWS_PATH . "Customer/profile_update.php");
  }


  #═════ Customer Actions ═════════════════════════

  public function SignUp() {  
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname']; 
    $email = $_POST['email'];
    $userPass = $_POST['userPass'];
      
    $existingUser = UserDAO::ExistEmail($email);
  
    if(!$existingUser) {
      $user = new User();   
      $user->setFirstname($firstname);
      $user->setLastname($lastname);
      $user->setEmail($email);
      $user->setUserPass(!empty($userPass) ? $userPass : '123');
      $user->setUserType('customer');
      $user->setIsActive(TRUE); 
      
      UserDAO::Add($user);   
        
      $_SESSION['message'] = "Registered successfully! <br>Sign in & enjoy.";
      $_SESSION['message_type'] = "Success"; 
        
      header("location: index.php");
      exit();
    }
    else {
      $_SESSION['message'] = "Registered email!";
      $_SESSION['message_type'] = "Error";
        
      header("location: index.php");
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

    ShoppingDAO::Add($shopping);
  }


  public function UpdateProfile() {
    $userId = $_POST['userId'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $userPass = $_POST['userPass'];

    $currentUser = UserDAO::GetById($userId);
    
    if($currentUser) {
      $user = new User();   
      $user->setUserId($userId);
      $user->setFirstname($firstname);
      $user->setLastname($lastname);
      $user->setEmail($email);
      $user->setUserType($currentUser->getUserType());
      $user->setUserPass(!empty($userPass) ? $userPass : $currentUser->getUserPass());
      $user->setIsActive($currentUser->getIsActive()); 

      UserDAO::Update($user);

      $_SESSION['message'] = "Updated successfully! <br>You must restart session.";
      $_SESSION['message_type'] = "Success"; 
      header("location: ?controller=Customer&action=ProfileView");
      exit();
    } 
    else {
      $_SESSION['message'] = "Failed to update!";
      $_SESSION['message_type'] = "Error";

      header("location: ?controller=Customer&action=ProfileView");
      exit(); 
    }
  }


  public function CreatePurchase() {
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
            ItemDAO::UpdateStock($itemId, $quantity);
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
      header("location: ?controller=Customer&action=ItemListView");
      exit();
    }
  }
  

  public function Logout() {
    Utils::Logout();
  }

}

?>