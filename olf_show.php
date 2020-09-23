<html>
<head>
	<link rel="stylesheet" href="style.css">
	<title>Read from Database</title>
</head>
<body>
<div class="topnav">
  <a href="./index.html">Home</a>
  <a href="./upload_page.html">Upload</a>
  <a class="active" href="./more_read_csv.php">View</a>
  <a href="./instructions.html">How To</a>
</div>
</body>
</html>

<?php
  // Create database connection
// $db = mysqli_connect("localhost", "root", "", "image_upload");
// if(!$db)
// die("no db");
// if(!mysqli_select_db($db,"image_upload"))
// die("No database selected.");

$myspec = $_GET['genotype']; // $id is now defined
if ($myspec=="") $ifq = 0; else $ifq = 1;
echo "<div style=\"padding-left:16px\">";
echo "<br><a href=\"new_write_out.php?genotype=".$myspec."\"><button>Save full set to CSV</button></a><br>";
echo "<form action=\"select_write_out.php\" method=\"post\">";
$CSVfp = fopen("mycsv.csv", "r");
if($CSVfp !== FALSE) {
print "<PRE>";
echo "<table><tr><th>Animal ID</th><th>Brunno</th><th>Date</th><th>Genotype</th><th>Sex</th><th>Age</th><th>Neuroglancer</th></tr>";
while(! feof($CSVfp)) {	
	$data = fgetcsv($CSVfp, 1000, ",");
	if ($ifq?$data[9] == $myspec:true) {
		echo "<tr><td>".$data[0]."</td><td>".$data[1]."</td><td>".$data[2]."</td><td>".$data[3]."</td><td>".$data[4]."</td><td>".$data[5]."</td><td>";
		echo "<a href=\"mylink.php?name=".strstr( $data[7], ".", true )."\"><img src=\"".$data[7]."\">\n</a></td>";
		echo "<td><input type=\"checkbox\" name=\"checkbox[]\" value=\"".$data[0]."\"></td>";
		echo "<td><a href=\"".$data[7]."\" download>Download</a></td></tr>";
	}
}

// $sql = "SELECT * from image_upload";
// $result = mysqli_query($db, $sql);
// if (mysqli_num_rows($result) > 0) {
//  // output data of each row
// 	if ($myspec=="") $ifq = 0; else $ifq = 1;
//  while($row = mysqli_fetch_assoc($result)) {
//		if ($ifq?$row["Genotype"] == $myspec:true) {
// 		echo $row["AnimalID"]." ". $row["Brunno"]." ".$row["Date"]." ".$row["Genotype"]." ".$row["Sex"]." ".$row["Age"] "<br>";
//  }
// } else {
//  echo "0 results";
// }}
echo "<br><input type=\"submit\" value=\"Save Selection to CSV\"><br>";
echo "</form>";
echo "</table></div>";
fclose($CSVfp);
?>