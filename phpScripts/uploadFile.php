<?php
$target_dir = "C:\Users\harry.vince\OneDrive - Accenture\Desktop\Uni DTS\Assignments\CMP205 Project Management\Room_Booking_System\/images/";
$target_file = $target_dir . basename($_POST['selecting'].".jpeg");
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $oldmask = umask(0);
        chmod($target_file, 0777);
        umask($oldmask);
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        header("Location: ../ManagementDashboard.php");
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
?>