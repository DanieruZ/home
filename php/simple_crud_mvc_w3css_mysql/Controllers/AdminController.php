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


  #═════ USER VIEWS ═════════════════════════

   public function UserProfileView($userId) {
    Utils::checkAdminSession();
    $user = $this->userDAO->getUserById($userId);
    require_once(VIEWS_PATH . "admin_nav.php");
    require_once(VIEWS_PATH . "admin_user_profile.php");
  } 


  public function UserListView() {   
    Utils::checkAdminSession(); 
    $userList = $this->userDAO->getAllUser();
    require_once(VIEWS_PATH . "admin_nav.php");
    require_once(VIEWS_PATH . "admin_user_list.php");
    require_once(VIEWS_PATH . "pagination.php");
    require_once(VIEWS_PATH . "modal_delete_confirm.php");
    Utils::displayMessage();
  }

  
  public function AddUserView() {   
    Utils::checkAdminSession(); 
    require_once(VIEWS_PATH . "admin_nav.php");
    require_once(VIEWS_PATH . "admin_user_add.php");
    Utils::displayMessage();
  }
  
  
  public function UpdateUserView($userId) {  
    Utils::checkAdminSession(); 
    $user = $this->userDAO->getUserById($userId);
    require_once(VIEWS_PATH . "admin_nav.php");
    require_once(VIEWS_PATH . "admin_user_update.php");
  }


  public function DeleteUserView($userId) {  
    Utils::checkAdminSession(); 
    $this->DeleteUser($userId);
    require_once(VIEWS_PATH . "admin_nav.php");
    require_once(VIEWS_PATH . "admin_user_list.php");
  }
  

  #═════ ITEM VIEWS ═════════════════════════

  public function ItemListView() {  
    Utils::checkAdminSession(); 
    $itemList = $this->itemDAO->getAllItem();
    require_once(VIEWS_PATH . "admin_nav.php");
    require_once(VIEWS_PATH . "admin_item_list.php");
    require_once(VIEWS_PATH . "pagination.php");
    require_once(VIEWS_PATH . "modal_delete_confirm.php");
    Utils::displayMessage();
  }


  public function AddItemView() {   
    Utils::checkAdminSession(); 
    require_once(VIEWS_PATH . "admin_nav.php");
    require_once(VIEWS_PATH . "admin_item_add.php");
    Utils::displayMessage();
  }
  
  
  public function UpdateItemView($itemId) {   
    Utils::checkAdminSession(); 
    $item = $this->itemDAO->getItemById($itemId);
    require_once(VIEWS_PATH . "admin_nav.php");
    require_once(VIEWS_PATH . "admin_item_update.php");
  }


  public function DeleteItemView($itemId) {  
    Utils::checkAdminSession(); 
    $this->DeleteItem($itemId);
    require_once(VIEWS_PATH . "admin_nav.php");
    require_once(VIEWS_PATH . "admin_item_list.php");
  }


  #═════ SHOPPING VIEWS ═════════════════════════

  public function ShoppingListView() {   
    Utils::checkAdminSession();
    $shoppingList = $this->shoppingDAO->getAllShopping();
    require_once(VIEWS_PATH . "admin_nav.php");
    require_once(VIEWS_PATH . "admin_shopping_list.php");
    require_once(VIEWS_PATH . "pagination.php");
  } 


  public function ShoppingUserListView($userId) {   
    Utils::checkAdminSession();
    $shoppingList = $this->shoppingDAO->getShoppingByUserId($userId);
    require_once(VIEWS_PATH . "admin_nav.php");
    require_once(VIEWS_PATH . "admin_shopping_list.php");
    require_once(VIEWS_PATH . "pagination.php");
  } 


  #═════ USER ACTIONS ═════════════════════════

  public function AddUser(
    $firstname, 
    $lastname, 
    $email, 
    $userPass,
    $userType,
    $isActive) {  
    
    $existingUser = $this->userDAO->existUserEmail($email);

    if(!$existingUser) {
      $user = new User();   
      $user->setFirstname($firstname);
      $user->setLastname($lastname);
      $user->setEmail($email);
      $user->setUserPass(!empty($userPass) ? $userPass : '123');
      $user->setUserType($userType);
      $user->setIsActive($isActive); 
    
      $this->userDAO->addUser($user);   
      
      $_SESSION['message'] = "Registered successfully!";
      $_SESSION['message_type'] = "Success"; 
      
      header("location: ../Admin/AddUserView");
      exit();
    }
    else {
      $_SESSION['message'] = "Registered email!";
      $_SESSION['message_type'] = "Error";
      
      header("location: ../Admin/AddUserView");
      exit();
    }  
  }


  public function UpdateUser(
    $userId,
    $firstname, 
    $lastname,
    $email,
    $userPass,
    $userType,
    $isActive) {

    $currentUser = $this->userDAO->getUserById($userId);

    if($currentUser) {
      $user = new User();   
      $user->setUserId($userId);
      $user->setFirstname($firstname);
      $user->setLastname($lastname);
      $user->setEmail($email);
      $user->setUserType($userType);
      $user->setUserPass(!empty($userPass) ? $userPass : $currentUser->getUserPass());
      $user->setIsActive($isActive);  

      $this->userDAO->updateUser($user);

      $_SESSION['message'] = "Updated successfully!";
      $_SESSION['message_type'] = "Success"; 

      header("location: ../Admin/UserListView");
      exit();
    } 
    else {
      $_SESSION['message'] = "Failed to update!";
      $_SESSION['message_type'] = "Error";

      header("location: ../Admin/UserListView");
      exit(); 
    }
  } 

  
  public function DeleteUser($userId) {
    $this->userDAO->deleteUserById($userId);
    $_SESSION['message'] = "Deleted successfully!";
    $_SESSION['message_type'] = "Success"; 
    header("location: ../UserListView");
    exit();
  }


  #═════ ITEM ACTIONS ═════════════════════════

  public function AddItem(
    $itemName, 
    $brand, 
    $model, 
    $stock, 
    $price, 
    $isActive) {  
    
    $existingItem = $this->itemDAO->existItemName($itemName);

    if(!$existingItem) {
      $item = new Item();   
      $item->setItemName($itemName);
      $item->setBrand($brand);
      $item->setModel($model);
      $item->setStock($stock); 
      $item->setPrice($price); 
      $item->setIsActive($isActive); 

      $this->itemDAO->addItem($item);   
      
      $_SESSION['message'] = "Registered successfully!";
      $_SESSION['message_type'] = "Success"; 
      
      header("location: ../Admin/AddItemView");
      exit();
    }
    else {
      $_SESSION['message'] = "Registered item!";
      $_SESSION['message_type'] = "Error";
      
      header("location: ../Admin/AddItemView");
      exit();
    }  
  }

  
  public function UpdateItem(
    $itemId, 
    $itemName, 
    $brand, 
    $model, 
    $stock, 
    $price,
    $isActive) {

    $currentItem = $this->itemDAO->getItemById($itemId);

    if($currentItem) {
      $item = new Item();   
      $item->setItemId($itemId);
      $item->setItemName($itemName);
      $item->setBrand($brand);
      $item->setModel($model);
      $item->setStock($stock); 
      $item->setPrice($price); 
      $item->setIsActive($isActive); 

      $this->itemDAO->updateItem($item);

      $_SESSION['message'] = "Updated successfully!";
      $_SESSION['message_type'] = "Success"; 

      header("location: ../Admin/ItemListView");
      exit();
    } 
    else {
      $_SESSION['message'] = "Failed to update!";
      $_SESSION['message_type'] = "Error";

      header("location: ../ItemListView");
      exit(); 
    }
  } 


  public function DeleteItem($itemId) {
    $this->itemDAO->deleteItemById($itemId);
    $_SESSION['message'] = "Item deleted successfully!";
    $_SESSION['message_type'] = "Success"; 
    header("location: ../ItemListView");
    exit();
  }


  public function Logout() {
    Utils::logout();
  }

}

?>