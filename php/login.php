<!DOCTYPE html>
<html>
<body>

<?php

if (isset($_POST['entrar'])){
    $name = $_POST['loginUsername'];
    $pass = $_POST['loginSenha'];

    require_once 'conexao.php';
    require_once 'functions.php';

    if(emptyInputLogin($name,$pass)==true){
        header("location: ../login.html?error=emptyinput");
        exit();
      }

      $uidExists = uidexists($conn,$name);

      if ($uidExists == false){
          header("location: ../login.html?error=userdoesnotexist");
          exit();
      }
  
      $pwdhashed = $uidExists['passcode'];

      //verificando senha, por alguma razão esta sempre dando false
      if ( password_verify($pass,$pwdhashed)){
          session_start();
          $_SESSION['userid']=$uidExists['userID'];
          $_SESSION['username']=$uidExists['username'];
  
          header("location: ../index.html?error=none");
          exit();
      }else{
        header("location: ../login.html?error=wronglogin");
        exit();
      }
}else{
  header("location: ../login.html");
  exit();
}
?>