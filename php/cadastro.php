<!DOCTYPE html>
<html>
<body>

<?php

if (isset($_POST["cadastrar"])){

  $name = $_POST["Username"];
  $pass = $_POST["senha"];

  define('__ROOT__', dirname(dirname(__FILE__)));
  require_once (__ROOT__.'\php\conexao.php');
  require_once (__ROOT__.'\php\functions.php');

  if(emptyInputSignup($name,$pass)!=false){
    header("location:  ..\cadastro.html?error=emptyinput");
    exit();
  }
  if(invalidUid($name)!=false){
    header("location:  ..\cadastro.html?error=invalidUid");
    exit();
  }
  if(invalidPass($pass)!=false){
    header("location:  ..\cadastro.html?error=invalidpass");
    exit();
  }
  if(uidexists($conn,$name)!=false){
    header("location:  ..\cadastro.html?error=uiexists");
    exit();
  }
  createUser($conn,$name,$pass);
}else{
  header("location: ..\cadastro.html");
  exit();
}
