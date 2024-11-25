<?php 

namespace Utils;

class Utils {

  public static function CheckUserSession() {
    (session_status() === PHP_SESSION_NONE) ? session_start() : NULL;

    if(!isset($_SESSION['userType'])) {
      self::Logout();
    }
  }


  public static function DisplayMessage() {
    if(isset($_SESSION['message'])) {
      $messageClass = ($_SESSION['message_type'] === 'Success') ? 'alert alert-success' : 'alert alert-danger';
      $icon = ($_SESSION['message_type'] === 'Success') ? 'fas fa-check-circle' : 'fas fa-exclamation-circle';
      $headerText = $_SESSION['message_type'] === 'Success' ? 'Success' : 'Error';
  
      $output = 
        <<<HTML
          <div class="position-fixed w-100" style="top: 50%; transform: translateY(-50%); z-index: 1050;">
            <div id="message" class="$messageClass alert-dismissible fade show mx-auto" role="alert">
              <div class="text-center">
                <h3><i class="$icon"></i> $headerText</h3>
                <strong>{$_SESSION['message']}</strong>
              </div>
            </div>
          </div>
        HTML;
  
      echo $output;
      unset($_SESSION['message']);
    }
  }
  
  
  public static function Logout() {
    session_start();
    session_unset();
    session_destroy();
    header("location: index.php");
    exit();
  }

}

?>