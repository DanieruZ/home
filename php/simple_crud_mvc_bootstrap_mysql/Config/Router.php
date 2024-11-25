<?php 

namespace Config;

class Router {

  public static function Route($controller, $action) {
    $controllerName = "Controllers\\" . ucfirst($controller) . "Controller";
    $controllerInstance = new $controllerName();

    $params = $_GET;
    unset($params['controller'], $params['action']);

    if(method_exists($controllerInstance, $action)) {
      call_user_func_array([$controllerInstance, $action], $params);
    } 
    else {
      echo "Method not found: $action on $controller";
    }
  }

}

?>