<?php

if (isset($_POST['submitpost'])){
  if(session_status() == PHP_SESSION_ACTIVE){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_SESSION['username'];

    require_once ('conexao.php');
    require_once ('functions.php');

    if(emptyInputPost($title,$content,$author)==true){
        header("location: ../newpost.html?error=emptyinput");
        exit();
      }
    
    $sql = "INSERT INTO posts (title, content, author) VALUES (?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)){
        header("location:  ../newpost.html?error=stmtfailed");
    exit();
    }
    mysqli_stmt_bind_param($stmt,"sss",$title,$content,$author);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../newpost.html?error=none");
    exit();
    
  }else{
    header("location: ../newpost.html?error=notloggedin");
    exit();
  }
}else{
  header("location: ../newpost.html?error=none");
exit();
}