<?php
include 'conn.php';

if (isset($_POST['submit_327'])) {


$password_t_2_327 = mysqli_real_escape_string($conn, md5($_POST["password_t_2_327"]));
$email_t_1_327 = mysqli_real_escape_string($conn, $_POST["email_t_1_327"]);

$select = mysqli_query($conn, "SELECT * FROM user WHERE password = '$password_t_2_327' AND email = '$email_t_1_327'") or die('query failed');

if(mysqli_num_rows($select) > 0){

echo "<script>alert('already exist!');</script>";

}else{


$insert_data = " INSERT INTO user (password, email) VALUES ('$password_t_2_327','$email_t_1_327')";

if (mysqli_query($conn, $insert_data)) {
    echo "<script>alert('Data Insert successfully!');</script>";
} else {
    echo'<script>alert("Error updating data: " . mysqli_error($conn) . "</script>';}
}

}
?>

 <link rel="stylesheet" href="style.css">


<form method="POST"  enctype="multipart/form-data">
<h2>Regiser</h2>
 <br>
 <label>Email :</label><input type="email" placeholder="Enter Email..." name="email_t_1_327"><br>
<br>
 <label>Password :</label><input type="password" placeholder="Enter Password..." name="password_t_2_327"><br>

 
 
 
<input type="submit" name="submit_327">



<p>You have an account? <a href="login.php">Login now</a></p>
</form>