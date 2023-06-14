<?php

require_once ('conexao.php');
require_once ('functions.php');

$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt,$sql)){
    header("location:  ../posts.html?error=stmtfailed");
exit();
}

$result = mysqli_query($conn,$sql);
$posts = [];
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $posts[] = $row;
  }
}

header('Content-Type: application/json');
echo json_encode($posts);