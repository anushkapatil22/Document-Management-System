
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
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style type="text/css">
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

        #form-container {
    background-color: #f4f4f4;
    padding: 20px;
    border-radius: 10px;
    width: 300px;
    margin: 0 auto;
     border: 1px solid;
}

h2 {
    color: #748c8d;
    text-align: center;
}

#upload-form {
    text-align: center;
}

#file-input {
    margin: 10px 0;
}

input[type="submit"] {
    background-color: #748c8d;
    color: #fff;
    padding: 8px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color: #5e7576;
}

    </style>
</head>
<body>
 <?php
include 'conn.php';

if (isset($_POST['add'])) {


 if ($_FILES['image2']['name']) {
                $imageDirectory = 'all/'; // Directory to save the uploaded images in the "all" folder
                $imageFileName2 = $_FILES['image2']['name']; // Get the uploaded file name
                $imageFilePath2 = $imageDirectory . $imageFileName2; // Define the full file path

                if (move_uploaded_file($_FILES['image2']['tmp_name'], $imageFilePath2)) {
                    // Delete the old image file if a new image is uploaded
                    if (!empty($img2) && file_exists($img2)) {
                        unlink($img2);
                    }
                   
                } else {
                    die('Error: Failed to upload the image file');
                }
            } else {
                $imageFilePath2 = $img2; // Use the existing image path if no new image is uploaded
                echo "No new image uploaded.";
            }

$select = mysqli_query($conn, "SELECT * FROM doc WHERE user_id = '$user_id' AND image = '$imageFilePath2'") or die('query failed');

if(mysqli_num_rows($select) > 0){

echo "<script>alert('already exist!');</script>";

}else{


$insert_data = " INSERT INTO doc (user_id, image) VALUES ('$user_id','$imageFilePath2')";

if (mysqli_query($conn, $insert_data)) {
    echo "<script>alert('Data Insert successfully!');</script>";
} else {
    echo'<script>alert("Error updating data: " . mysqli_error($conn) . "</script>';}
}

}
?>
        <div id="form-container">
            <h2>Upload Doc...</h2>
            <form id="upload-form" method="POST" enctype="multipart/form-data">
                <input type="file" id="file-input" name="image2" accept="image/*">
             <br>   <br>   <input type="submit" name="add">
<br><br>
                <a href="index.php">Back...</a>
            </form>
        </div>
</body>
</html>