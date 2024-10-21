<?php

include 'conn.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:index.php');
   }else{
      echo "<script>alert('Incorrect email or password');</script>";
   }

}

?>


 <link rel="stylesheet" href="style.css">


<form method="POST"  enctype="multipart/form-data">
<h2>Login</h2><br>
 
 <label>Email :</label><input type="email" placeholder="Enter Email..." name="email"><br><br>

 <label>Password :</label><input type="password" placeholder="Enter Password..." name="password"><br>

 
 
 
<input type="submit" name="submit">

<p>don't have an account? <a href="register.php">regiser now</a></p>

</form>