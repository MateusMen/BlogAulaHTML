<!DOCTYPE html>
<html>
<body>

<?php

if (isset($_POST["cadastrar"])){

  $name = $_POST["Username"];
  $pass = $_POST["senha"];


  require_once ('conexao.php');
  require_once ('functions.php');

  if(emptyInputSignup($name,$pass)==true){
    header("location: cadastro.html?error=emptyinput");
    exit();
  }
  if(invalidUid($name)!==false){
    header("location: cadastro.html?error=invalidUid");
    exit();
  }
  if(invalidPass($pass)!==false){
    header("location: cadastro.html?error=invalidpass");
    exit();
  }
  if(uidexists($conn,$name)!==false){
    header("location: cadastro.html?error=uiexists");
    exit();
  }
  createUser($conn,$name,$pass);
}else{
  header("location: cadastro.html?error=none");
  exit();
}
?>