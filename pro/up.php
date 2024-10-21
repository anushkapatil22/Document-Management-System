<?php
include 'conn.php';

if (isset($_POST['submit_329'])) {

$r_id329 = mysqli_real_escape_string($conn, $_POST["r_id329"]);
$text_t_3_329 = mysqli_real_escape_string($conn, $_POST["text_t_3_329"]);
 if ($_FILES['image2']['name']) {
                $imageDirectory = 'all/'; // Directory to save the uploaded images in the "all" folder
                $imageFileName2 = $_FILES['image2']['name']; // Get the uploaded file name
                $imageFilePath2 = $imageDirectory . $imageFileName2; // Define the full file path

                if (move_uploaded_file($_FILES['image2']['tmp_name'], $imageFilePath2)) {
                    // Delete the old image file if a new image is uploaded
                    if (!empty($img2) && file_exists($img2)) {
                        unlink($img2);
                    }
                    echo "Image uploaded successfully!";
                } else {
                    die('Error: Failed to upload the image file');
                }
            } else {
                $imageFilePath2 = $img2; // Use the existing image path if no new image is uploaded
                echo "No new image uploaded.";
            }
$updateQuery = "UPDATE `asorg_329` SET `t_3` = '$text_t_3_329', `image2` = '$imageFilePath2' WHERE id ='$r_id329';";

if (mysqli_query($conn, $updateQuery)) {
    echo '<script>alert("Data updated successfully!");</script>';
} else {
    echo'<script>alert("Error updating data: " . mysqli_error($conn) . "</script>';}
}

mysqli_close($conn);
?>

<form method="POST"  enctype="multipart/form-data">

<h1>Index</h1>
<div class="custom-select" style="width:200px;">
<select name="r_id329"><option>Select ID:</option>
<option value='1'>1</option>
<option value='2'>2</option>
<option value='3'>3</option>
<option value='4'>4</option>
<option value='5'>5</option>
<option value='6'>6</option>
</select></div>

 <label>Text :</label><br><input type="text" placeholder="Enter Text..." name="text_t_3_329"><br>

 
 
 
 
 <label>Image :</label><br><input type="file" name="image2"><br>

<input type="submit" name="submit_329" value="Update"></form>





