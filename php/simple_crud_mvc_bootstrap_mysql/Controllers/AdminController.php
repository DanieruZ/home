<?php 

namespace Controllers;

use DAO\UserDAO as UserDAO;
use DAO\ItemDAO as ItemDAO;
use DAO\ShoppingDAO as ShoppingDAO;
use Models\User as User;
use Models\Item as Item;
use Models\Shopping as Shopping;
use Utils\Utils as Utils;

class AdminController {
  
  public function __construct() {}  


  #═════ User Views ═════════════════════════

  public function UserProfileView($userId) {
    Utils::CheckUserSession();
    $user = UserDAO::GetById($userId);
    require_once(VIEWS_PATH . "Admin/navbar.php");
    require_once(VIEWS_PATH . "Admin/user_profile.php");
  } 


  public function UserListView() {
    Utils::CheckUserSession(); 
    $userList = UserDAO::All();
    require_once(VIEWS_PATH . "Admin/navbar.php");
    require_once(VIEWS_PATH . "Admin/user_list.php");
    require_once(VIEWS_PATH . "pagination.php");
    require_once(VIEWS_PATH . "modal_delete_confirm.php");
    Utils::DisplayMessage();
  }


  public function AddUserView() {   
    Utils::CheckUserSession(); 
    require_once(VIEWS_PATH . "Admin/navbar.php");
    require_once(VIEWS_PATH . "Admin/user_add.php");
    Utils::DisplayMessage();
  }
  
  
  public function UpdateUserView($userId) {  
    Utils::CheckUserSession(); 
    $user = UserDAO::GetById($userId);
    require_once(VIEWS_PATH . "Admin/navbar.php");
    require_once(VIEWS_PATH . "Admin/user_update.php");
  }


  public function DeleteUserView($userId) {  
    Utils::CheckUserSession();
    $this->DeleteUser($userId);
    require_once(VIEWS_PATH . "Admin/navbar.php");
    require_once(VIEWS_PATH . "Admin/user_list.php");
  }
  

  #═════ Item Views ═════════════════════════

  public function ItemListView() {
    Utils::CheckUserSession();
    $itemList = ItemDAO::All();
    require_once(VIEWS_PATH . "Admin/navbar.php");
    require_once(VIEWS_PATH . "Admin/item_list.php");
    require_once(VIEWS_PATH . "pagination.php");
    require_once(VIEWS_PATH . "modal_delete_confirm.php");
    Utils::DisplayMessage();
  }


  public function AddItemView() {   
    Utils::CheckUserSession(); 
    require_once(VIEWS_PATH . "Admin/navbar.php");
    require_once(VIEWS_PATH . "Admin/item_add.php");
    Utils::DisplayMessage();
  }
  
  
  public function UpdateItemView($itemId) {   
    Utils::CheckUserSession();
    $item = ItemDAO::GetById($itemId);
    require_once(VIEWS_PATH . "Admin/navbar.php");
    require_once(VIEWS_PATH . "Admin/item_update.php");
  }


  public function DeleteItemView($itemId) {  
    Utils::CheckUserSession();
    $this->DeleteItem($itemId);
    require_once(VIEWS_PATH . "Admin/navbar.php");
    require_once(VIEWS_PATH . "Admin/item_list.php");
  }


  #═════ Shopping Views ═════════════════════════

  public function ShoppingListView() {   
    Utils::CheckUserSession();
    $shoppingList = ShoppingDAO::All();
    require_once(VIEWS_PATH . "Admin/navbar.php");
    require_once(VIEWS_PATH . "Admin/shopping_list.php");
    require_once(VIEWS_PATH . "pagination.php");
  } 


  public function ShoppingUserListView($userId) {   
    Utils::CheckUserSession();
    $shoppingList = ShoppingDAO::GetByUserId($userId);
    require_once(VIEWS_PATH . "Admin/navbar.php");
    require_once(VIEWS_PATH . "Admin/shopping_list.php");
    require_once(VIEWS_PATH . "pagination.php");
  } 


  #═════ User Actions ═════════════════════════

  public function AddUser() { 
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $userPass = $_POST['userPass'];
    $userType = $_POST['userType'];
    $isActive = $_POST['isActive']; 
    
    $existingUser = UserDAO::ExistEmail($email);

    if(!$existingUser) {
      $user = new User();   
      $user->setFirstname($firstname);
      $user->setLastname($lastname);
      $user->setEmail($email);
      $user->setUserPass(!empty($userPass) ? $userPass : '123');
      $user->setUserType($userType);
      $user->setIsActive($isActive); 
    
      UserDAO::Add($user);   
      
      $_SESSION['message'] = "Registered successfully!";
      $_SESSION['message_type'] = "Success"; 
      
      header("location: ?controller=Admin&action=AddUserView");
      exit();
    }
    else {
      $_SESSION['message'] = "Registered email!";
      $_SESSION['message_type'] = "Error";
      
      header("location: ?controller=Admin&action=AddUserView");
      exit();
    }  
  }


  public function UpdateUser() {
    $userId = $_POST['userId'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $userPass = $_POST['userPass'];
    $userType = $_POST['userType'];
    $isActive = $_POST['isActive']; 

    $currentUser = UserDAO::GetById($userId);

    if($currentUser) {
      $user = new User();   
      $user->setUserId($userId);
      $user->setFirstname($firstname);
      $user->setLastname($lastname);
      $user->setEmail($email);
      $user->setUserType($userType);
      $user->setUserPass(!empty($userPass) ? $userPass : $currentUser->getUserPass());
      $user->setIsActive($isActive);  

      UserDAO::Update($user);

      $_SESSION['message'] = "Updated successfully!";
      $_SESSION['message_type'] = "Success"; 

      header("location: ?controller=Admin&action=UserListView");
      exit();
    } 
    else {
      $_SESSION['message'] = "Failed to update!";
      $_SESSION['message_type'] = "Error";

      header("location: ?controller=Admin&action=UserListView");
      exit(); 
    }
  } 

  
  public function DeleteUser($userId) {
    UserDAO::DeleteById($userId);
    $_SESSION['message'] = "Deleted successfully!";
    $_SESSION['message_type'] = "Success"; 
    header("location: ?controller=Admin&action=UserListView");
    exit();
  }


  #═════ Item Actions ═════════════════════════

  public function AddItem() {  
    $itemName = $_POST['itemName'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $stock = $_POST['stock'];
    $price = $_POST['price'];
    $isActive = $_POST['isActive'];
    
    $existingItem = ItemDAO::ExistModel($model);

    if(!$existingItem) {
      $item = new Item();   
      $item->setItemName($itemName);
      $item->setBrand($brand);
      $item->setModel($model);
      $item->setStock($stock); 
      $item->setPrice($price); 
      $item->setIsActive($isActive); 

      ItemDAO::Add($item);   
      
      $_SESSION['message'] = "Registered successfully!";
      $_SESSION['message_type'] = "Success"; 
      
      header("location: ?controller=Admin&action=AddItemView");
      exit();
    }
    else {
      $_SESSION['message'] = "Registered item!";
      $_SESSION['message_type'] = "Error";
      
      header("location: ?controller=Admin&action=AddItemView");
      exit();
    }  
  }

  
  public function UpdateItem() {
    $itemId = $_POST['itemId'];
    $itemName = $_POST['itemName'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $stock = $_POST['stock'];
    $price = $_POST['price'];
    $isActive = $_POST['isActive'];

    $currentItem = ItemDAO::GetById($itemId);

    if($currentItem) {
      $item = new Item();   
      $item->setItemId($itemId);
      $item->setItemName($itemName);
      $item->setBrand($brand);
      $item->setModel($model);
      $item->setStock($stock); 
      $item->setPrice($price); 
      $item->setIsActive($isActive); 

      ItemDAO::Update($item);

      $_SESSION['message'] = "Updated successfully!";
      $_SESSION['message_type'] = "Success"; 

      header("location: ?controller=Admin&action=ItemListView");
      exit();
    } 
    else {
      $_SESSION['message'] = "Failed to update!";
      $_SESSION['message_type'] = "Error";

      header("location: ?controller=Admin&action=ItemListView");
      exit(); 
    }
  } 


  public function DeleteItem($itemId) {
    ItemDAO::DeleteById($itemId);
    $_SESSION['message'] = "Item deleted successfully!";
    $_SESSION['message_type'] = "Success"; 
    header("location: ?controller=Admin&action=ItemListView");
    exit();
  }


  public function Logout() {
    Utils::Logout();
  }

}

?>