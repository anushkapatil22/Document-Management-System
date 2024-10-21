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
        background: #64686a;
}



.image-container {
    width: 100%;
    margin: 20px auto; /* Add margin for spacing */
    display: flex;
    flex-wrap: wrap; /* Allow items to wrap into multiple lines */
    justify-content: space-between; /* Distribute items evenly */
    padding: 30px;
}

.image-wrapper {
    position: relative;
    width: 30%; /* Adjust the width as needed */
    height: 200px; /* Set a fixed height */
    margin-bottom: 20px; /* Add margin at the bottom for spacing */
    overflow: hidden; /* Hide any overflow to ensure consistent height */
        border-radius: 10px;
    border: 1px solid;
}

.uploaded-image {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Maintain aspect ratio and cover container */
    object-position: center; /* Center the image */
    border: 1px solid #ccc; /* Add a border around the image */
    border-radius: 5px; /* Add border radius for rounded corners */
    transition: filter 0.3s ease; /* Add transition effect for blur */
}

.image-wrapper:hover .uploaded-image {
    filter: blur(5px); /* Apply blur effect on hover */
}

.download-link {
     position: absolute; /* Position the link */
    top: 50%; /* Align the link to the center vertically */
    left: 50%; 
    transform: translateX(-50%);
    background-color: #111; /* Semi-transparent background */
    padding: 10px 10px;
    border-radius: 5px;
    text-decoration: none;
    color: #fff;
    display: none;
}

.image-wrapper:hover .download-link {
    display: block; /* Show download link on hover */
}


.uploaded-image {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Maintain aspect ratio and cover container */
    object-position: center; /* Center the image */
    border: 1px solid #ccc; /* Add a border around the image */
    border-radius: 5px; /* Add border radius for rounded corners */
}

.clearfix {
    clear: both;
}

a{
    text-decoration: blink;

}	
    </style>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
   <div style="background: #111;
    position: absolute;
    top: 10px;
    padding: 10px;
    font-size: 20px;
    "><a href="index.php" style="color: #fff;"><span class="material-symbols-outlined">
arrow_back
</span> Back Home</a> </div>
<?php
// Check if the form is submitted
if (isset($_POST['delete'])) {
    // Check if the delete button is clicked
    if (isset($_POST['delete'])) {
        // Get the image ID from the form
        $image_id = $_POST['image_id'];

       include 'conn.php';

        // SQL to delete record
        $sql = "DELETE FROM doc WHERE id = $image_id";

        if ($conn->query($sql) === TRUE) {
         
              echo '<script>alert("Doc Delete successfully!");</script>';
        } else {
           

             echo '<script>alert("Error deleting record");</script>';
        }

        // Close connection
        $conn->close();
    }
}
?>

  



<?php
include "conn.php";
$select = mysqli_query($conn, "SELECT * FROM `doc` WHERE user_id = '$user_id'") or die("Query failed");
$count = 0; // Initialize counter

echo '<div class="image-container">'; // Open container div

while ($row328 = mysqli_fetch_assoc($select)) {
    $image_2_328 = $row328["image"];
    $image_id = $row328["id"];
 $image_name = basename($image_2_328); 
    // Display image inside a div
    echo '



    <div class="image-wrapper">

<form method="POST">
<input type="hidden" name="image_id" value="'.$image_id.'">
    <button name="delete" style="    position: absolute;
    padding: 10px;
    background: #0c0d0d;
    color: #fff; z-index:1;"><span class="material-symbols-outlined">
delete
</span></button>

</form>

              <img class="uploaded-image" src="'.$image_2_328.'" alt="Uploaded Image">
            <div>  <a href="'.$image_2_328.'" class="download-link" download="'.$image_name.'">Download <span class="material-symbols-outlined">
download
</span></a>
<br>
</div>


          </div>';

    $count++; // Increment counter

    // Add line break after every third iteration
    if ($count % 3 == 0) {
        echo '<div class="clearfix"></div>'; // Add clearfix to clear floats
    }
}

echo '</div>'; // Close container div
?>






</body>
</html>
