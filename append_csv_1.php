<?php
  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {

    // Get image name
  	$file = $_FILES['file']['name'];

  	// image file directory
  	$target = "csv/".basename($file);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
        	}else{
  		$msg = "Failed to upload image";
  	}
  }
?>
else
{
print "<form action='append_csv.php' method='post' enctype='multipart/form-data'>";
print "Choose file to import:<br><br>";
print "<input type='file' name='file' id='file'><br><br>";
print "<input type='submit' name='submit' value='extract'></form>";
}

?>
