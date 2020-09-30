<!DOCTYPE html>
<html>
<head>
	<title>Neuroglancer Instance</title>
	<script>
		function goBack() {
		  window.history.back();
		}
	</script>
</head>
<body>
<?php
$myname = $_GET["name"];
echo 
'<div id="left" style="float:left; width=800px; margin:50px;">
    <iframe id="myframe" src="http://neuroglancer-demo.appspot.com/#!%7B%22dimensions%22:%7B%22x%22:%5B1%2C%22%22%5D%2C%22y%22:%5B1%2C%22%22%5D%2C%22z%22:%5B1%2C%22%22%5D%7D%2C%22position%22:%5B12.660313606262207%2C6.433258533477783%2C7.5%5D%2C%22crossSectionScale%22:0.04978706836786394%2C%22projectionOrientation%22:%5B0.010284251533448696%2C0.007806878071278334%2C-0.3532925546169281%2C0.9354237914085388%5D%2C%22projectionScale%22:32%2C%22layers%22:%5B%7B%22type%22:%22image%22%2C%22source%22:%22nifti://http://127.0.0.1:9000/'.$myname.'.nii%22%2C%22tab%22:%22source%22%2C%22name%22:%22'.$myname.'.nii%22%7D%2C%7B%22type%22:%22segmentation%22%2C%22source%22:%7B%22url%22:%22nifti://http://127.0.0.1:9000/'.$myname.'_masked.nii%22%2C%22transform%22:%7B%22matrix%22:%5B%5B1%2C0%2C0%2C0%5D%2C%5B0%2C1%2C0%2C0%5D%2C%5B0%2C0%2C1%2C0%5D%5D%2C%22outputDimensions%22:%7B%22x%22:%5B1%2C%22%22%5D%2C%22y%22:%5B1%2C%22%22%5D%2C%22z%22:%5B1%2C%22%22%5D%7D%7D%7D%2C%22tab%22:%22source%22%2C%22name%22:%22'.$myname.'_masked.nii%22%7D%5D%2C%22selectedLayer%22:%7B%22layer%22:%22B03616_masked.nii%22%7D%2C%22layout%22:%224panel%22%7D" width="800" height="600" style="border:1px solid lightgrey;"></iframe> 
</div>';
?>
<button onclick="./index.html">Go Home</button>
<button onclick="goBack()">Go Back</button>
<?php

 $myname = $_GET["name"];
echo "<a href='".$myname.".nii' download><button>Download Nifti</button></a>";
echo "<a href='".$myname.".jpg' download><button>Download Center Slices</button></a>";

?>
</body>
</html>
