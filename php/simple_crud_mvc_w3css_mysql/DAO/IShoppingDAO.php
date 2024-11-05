<?php 

namespace DAO;

use Models\Shopping as Shopping;

interface IShoppingDAO {

  public function addShopping(Shopping $shopping);
  public function getAllShopping();
  public function getShoppingByUserId($userId);

}

?>