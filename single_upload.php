<?php
  // $db = mysqli_connect("localhost", "root", "", "image_upload");
  // if(!$db)
  // die("no db");
  // if(!mysqli_select_db($db,"image_upload"))
  // die("No database selected.");

  // $sql = "INSERT INTO image_upload ('AnimalID','Brunno','Date','Genotype','Sex','DOB','Body Weight') VALUES (".$_GET('Animal').','.$_GET('Brunno')','.$_GET('date').','.$_GET('genotype').','.$_GET('sex').','.$_GET('DOB').','.$_GET('body_weight')")";
  
  // if (mysqli_query($db, $sql)) {
  //  echo "New record created successfully";
  // } else {
  //  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  // }

  $myline = $_GET('Animal').','.$_GET('Brunno').','.$_GET('date').','.$_GET('genotype').','.$_GET('sex').','.$_GET('DOB').','.$_GET('body_weight').',';

  // Initialize message variable
  $msg = "";
  // If upload button is clicked ...
  if (isset($_POST['Animal'])) {
    echo $Animal;
    $fp = fopen("csv/mycsv.csv","a");
      fputcsv($fp,$myline);
    fclose($fp);
    // shell_exec("/Applications/MATLAB_R2020a.app/Contents/MacOS/MATLAB -nosplash -nodesktop -r \"getmidslice('".$image."'); quit();\"");
  }
?>

<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="./plupload/js/plupload.full.min.js"></script>
<title>Upload Photo</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
    <input type="hidden" name="size" value="1000000">
    <div id="filelist">Your browser doesn't have Flash, Silverlight or HTML5 support.</div>
    <div id="container" style="padding-left:16px">
      Nifti Upload Files
        <a id="pickfiles" href="javascript:;">[Select files]</a> 
        <a id="uploadfiles" href="javascript:;">[Upload files]</a>
    </div>
    <div style="padding-left:16px">
    <table>
    <tr>
      <td>Animal</td><td>Brunno</td><td>Date</td><td>Genotype</td><td>Sex</td><td>DOB</td><td>Body Weight</td>
    </tr>
    <tr>
      <td><textarea id="text" cols="8" rows="1" name="Animal" ></textarea></td>
      <td><textarea id="text" cols="8" rows="1" name="Brunno" ></textarea></td>
      <td><textarea id="text" cols="8" rows="1" name="date" ></textarea></td>
      <td><textarea id="text" cols="8" rows="1" name="genotype" ></textarea></td>
      <td><textarea id="text" cols="8" rows="1" name="sex" ></textarea></td>
      <td><textarea id="text" cols="8" rows="1" name="DOB" ></textarea></td>
      <td><textarea id="text" cols="8" rows="1" name="body_weight" ></textarea></td>
      <td><input type="checkbox" id="check" name="dwi" value="Bike">
      <label for="dwi">DWI</label></td>
      <td><input type="checkbox" id="check" name="perfusion" value="Bike">
      <label for="perfusion">perfusion</label></td>
      <td><input type="checkbox" id="check" name="gre" value="Bike">
      <label for="gre">GRE</label></td>
      <td><input type="checkbox" id="check" name="memri" value="Bike">
      <label for="memri">MEMRI</label></td>
      <td><input type="checkbox" id="check" name="olf" value="Bike">
      <label for="olf">Olfactory Memory Data</label></td>
      <td><input type="checkbox" id="check" name="mwm" value="Bike">
      <label for="mwm">MWM</label></td>
    </tr>
    </table>
    </div>
    <div style="padding-left:16px">
      <button type="submit" name="upload">POST</button>
    </div>
  </form>
  <br />
<pre id="console"></pre>
<script type="text/javascript">
var uploader = new plupload.Uploader({
  runtimes : 'html5,flash,silverlight,html4',
  browse_button : 'pickfiles', 
  container: document.getElementById('container'),
  url : 'upload.php',
  filters : {
    max_file_size : '100mb',
    mime_types: [
      {title : "Image files", extensions : "jpg,gif,png,nii"},
      {title : "Zip files", extensions : "zip"}
    ]
  },
  init: {
    PostInit: function() {
      document.getElementById('filelist').innerHTML = '';
      document.getElementById('uploadfiles').onclick = function() {
        uploader.start();
        return false;
      };
    },
    FilesAdded: function(up, files) {
      plupload.each(files, function(file) {
        document.getElementById('filelist').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
      });
    },
    UploadProgress: function(up, file) {
      document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
    },
    Error: function(up, err) {
      document.getElementById('console').appendChild(document.createTextNode("\nError #" + err.code + ": " + err.message));
    }
  }
});
uploader.init();
</script>
</body>
</html>