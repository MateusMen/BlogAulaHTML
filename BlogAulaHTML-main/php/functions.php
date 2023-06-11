<!DOCTYPE html>
<html>
<body>

<?php


function emptyInputSignup($name,$pass){
    if (empty($name) == true or empty($pass) == true){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}

function emptyInputLogin($name,$pass){
    if (empty($name) == true or empty($pass)==true){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}
function invalidUid($name){
    if (!preg_match("/^[a-zA-Z0-9]*$/", $name) or strlen($name)>45){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}

function invalidPass($pass){
    if (!preg_match("/^[a-zA-Z0-9]*$/",$pass) or strlen($pass)>45){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}

function uidexists($conn,$name){
    /*procura se o usuario existe na databse, se sim retorna a linha inteira contendo a userid,
     o username e a senha, se o usuario não existe retorna falso*/
    $sql = "SELECT * FROM users WHERE username = ? ;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)){
        header("location:  ../cadastro.html?error=stmtfailed");
    exit();
    }

    mysqli_stmt_bind_param($stmt,"s",$name);
    mysqli_stmt_execute($stmt);

    $resultData=mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)){
        mysqli_stmt_close($stmt);
        return $row;
    }else{
        mysqli_stmt_close($stmt);
        $result = false;
        return $result;
    }

}

function createUser($conn,$name,$pass){
    $sql = "INSERT INTO users (username,passcode) VALUES (?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)){
        header("location:  ../cadastro.html?error=stmtfailed");
    exit();
    }

    $hashedPass = password_hash($pass,PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt,"ss",$name,$hashedPass);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../login.html?error=none");
    exit();
}


?>

</body>
</html>