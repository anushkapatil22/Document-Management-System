<?php

include 'conn.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
  <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #4b4848;
        }
        .can{
             background: #748c8d;
    padding: 50px;
    display: flex;
    gap: 50px;
    border-radius: 70px;
        }

        .aD{
             font-size: 50px;
    background: #374348;
    padding: 10px;
    border-radius: 30px;
    color: #fff;
        }

a{
    text-decoration: blink;

}
     </style>
     <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
   
<div class="can">
   <div class="aD" style="background: #eaeff1;color: #111;"><a href="add.php" style=" color: #111;"> Add Doc</a> <span class="material-symbols-outlined" style="
    font-size: 50px;
">
add_a_photo
</span></div>
   <div class="aD"><a href="all.php" style=" color: #fff;">All Doc </a><span class="material-symbols-outlined" style="
    font-size: 50px;
">
apps
</span></div>
</div>

</body>
</html>
