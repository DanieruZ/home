<?php 

namespace Utils;

class Utils {

  public static function checkAdminSession() {
    (session_status() === PHP_SESSION_NONE) ? session_start() : NULL;
      
    if (!isset($_SESSION['admin'])) {
      self::logout();
    }
  }


  public static function checkCustomerSession() {
    (session_status() === PHP_SESSION_NONE) ? session_start() : NULL;
    
    if (!isset($_SESSION['customer'])) {
      self::logout();
    }
  }


  public static function displayMessage() {
    if(isset($_SESSION['message'])) {
      $messageClass = ($_SESSION['message_type'] === 'Success') ? 'w3-green' : 'w3-red';
        
      $icon = ($_SESSION['message_type'] === 'Success') ? 'fas fa-check-circle' : 'fas fa-exclamation-circle';
      $headerText = $_SESSION['message_type'] === 'Success' ? 'Success' : 'Error';

      $output = 
        <<<HTML
          <div id="message" class="w3-panel w3-card w3-center w3-display-middle w3-half w3-round-large $messageClass" 
            onclick="this.style.display='none';">
          <h3><i class="$icon"></i> $headerText</h3>
            <b><p>{$_SESSION['message']}</p></b>
          </div>
        HTML;

      echo $output;
      unset($_SESSION['message']);
    }
  }


  public static function logout() {
    session_start();
    session_unset();
    session_destroy();
    header('location: ../index.php');
    exit();
  }

}

?>