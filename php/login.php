<!DOCTYPE html>
<html>
<body>

<?php

if (isset($_POST['entrar'])){
    $username = $_POST['loginUsername'];
    $passcode = $_POST['loginSenha'];

    require_once 'conexao.php';
    require_once 'functions.php';

    if(emptyInputLogin($name,$pass)!=false){
        header("location: login.html?error=emptyinput");
        exit();
      }

      $uidExists = uidexists($conn,$name);

      if ($uidExists == false){
          header("location: login.html?error=userdoesnotexist");
          exit();
      }
  
      $pwdhashed = $uidExists['passcode'];
      $checkpwd = password_verify($pass,$pwdhashed);
  
      if ($checkpwd == false){
          header("location: login.html?error=wronglogin");
          exit();
      }else if ($checkpwd == true){
          session_start();
          $_SESSION['userid']=$uidExists['userID'];
          $_SESSION['username']=$uidExists['username'];
  
          header("location: index.html?error=none");
          exit();
      }
}else{
  header("location login.html");
  exit();
}
?>