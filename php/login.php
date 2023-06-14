<!DOCTYPE html>
<html>
<body>

<?php

if (isset($_POST['entrar'])){
    $name = $_POST['loginUsername'];
    $loginpass = $_POST['loginSenha'];

    require_once 'conexao.php';
    require_once 'functions.php';

    if(emptyInputLogin($name,$loginpass)==true){
        header("location: ../login.html?error=emptyinput");
        exit();
      }

      $uidExists = uidexists($conn,$name);

      if ($uidExists == false){
          header("location: ../login.html?error=userdoesnotexist");
          exit();
      }

      //$pwdhashed = $uidExists['passcode'];
      
      //$auth = password_verify($loginpass,$pwdhashed);
      
      if ($loginpass==$uidExists['passcode']){
          if(session_status() === PHP_SESSION_NONE){
            
            session_set_cookie_params(['httponly' => true]);
            session_start();

            var_dump(session_id());
            $_SESSION['userID']=$uidExists['userID'];
            $_SESSION['username']=$uidExists['username'];
  
            header("location: ../index.html?error=none");
            exit();
          }else{
            header("location: ../login.html?error=alreadyloggedin");
            exit();
          }
      }else{
        header("location: ../login.html?error=wronglogin");
        exit();
      }
}else{
  header("location: ../login.html");
  exit();
}
?>