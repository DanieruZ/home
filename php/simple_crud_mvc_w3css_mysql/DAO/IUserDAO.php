<?php

namespace DAO;

use Models\User as User;

interface IUserDAO {

  public function addUser(User $user);
  public function getAllUser();
  public function getUserById($userId);
  public function getUserByEmail($email);
  public function updateUser(User $user);
  public function deleteUserById($userId);
  public function existUserEmail($email);
} 

?>