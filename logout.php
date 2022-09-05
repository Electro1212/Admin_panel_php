<?php
session_start();
  if(isset($_SESSION['id'])){
    unset ($_SESSION['id']);
    unset ($_SESSION['name']);
    unset ($_SESSION['email']);
    unset ($_SESSION['password']);
    unset ($_SESSION['dp']);
    header("Location:index.php");
    die;
  }
?>