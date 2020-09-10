<?php  
function dateToAge($stringDate){
	$mydate = date("Y-m-d",strtotime($stringDate));
	$date = new DateTime($mydate);
	$now = new DateTime();
	$interval = $now->diff($date);
	return $interval->m+12*$interval->y;
}
if ( isset($_POST["submit"]) ) {
	if ( isset($_FILES["file"])) {
	   	$chdate = 1;
		$chage = 1;
		$datecol = 2;
		$agecol = 5;
            //if there was an error uploading the file
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
        }
        else {
                 //Print file details
            echo "Upload: " . $_FILES["file"]["name"] . "<br />";
            echo "Type: " . $_FILES["file"]["type"] . "<br />";
            echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
            echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
                 //if file already exists
            if (file_exists("csv/" . $_FILES["file"]["name"])) {
            echo $_FILES["file"]["name"] . " already exists. ";
            }
            else {
            $storagename = $_FILES["file"]["name"];
            move_uploaded_file($_FILES["file"]["tmp_name"],"csv/".$storagename);
            echo "Stored in: " . "csv/" . $_FILES["file"]["name"] . "<br />";
            }
        }
        $CSVfp = fopen("csv/".$_FILES["file"]["name"],"r");
        $nw = fopen("csv/hi.csv","a");
        while (! feof($CSVfp)) {
        	$myline = fgetcsv($CSVfp,1000,",");
        	$myline[$datecol]=$chdate?dateToAge($myline[$datecol]):$myline[$datecol];
			$myline[$agecol]=$chage?dateToAge($myline[$agecol]):$myline[$agecol];
	        // foreach($myline as $value){
	        // 	 echo $value;
	        // }
	        fputcsv($nw,$myline);
	        // echo "\n";
    	}
    	file_put_contents($nw,str_replace('-','_',file_get_contents($nw)));
		file_put_contents($nw,str_replace(':','!',file_get_contents($nw)));
		file_put_contents($nw,str_replace('<','[',file_get_contents($nw)));
		file_put_contents($nw,str_replace('>',']',file_get_contents($nw)));
		file_put_contents($nw,str_replace('/','(',file_get_contents($nw)));
		file_put_contents($nw,str_replace('\\',')',file_get_contents($nw)));
		file_put_contents($nw,str_replace('|',';',file_get_contents($nw)));
		file_put_contents($nw,str_replace('?','$',file_get_contents($nw)));
		file_put_contents($nw,str_replace('*','@',file_get_contents($nw)));
    	fclose($nw);
		fclose($CSVfp);
     } else {
            echo "No file selected <br />";
     }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Upload Photo</title>
<script type="text/javascript" src="./plupload/js/plupload.full.min.js"></script>
</head>
<body>
<table width="600">
<div id="filelist">Your browser doesn't have Flash, Silverlight or HTML5 support.</div>
<br />
<div id="container" style="padding-left:16px">
Nifti Upload Files
<a id="pickfiles" href="javascript:;">[Select files]</a> 
<a id="uploadfiles" href="javascript:;">[Upload files]</a>
</div>
<br />
<pre id="console"></pre>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="size" value="1000000">
<tr>
<td width="20%">Select file</td>
<td width="80%"><input type="file" name="file" id="file" /></td>
</tr>
<tr>
<td>Submit</td>
<td><input type="submit" name="submit" /></td>
</tr>
</form>
</table>
<script type="text/javascript">
// Custom example logic
var uploader = new plupload.Uploader({
  runtimes : 'html5,flash,silverlight,html4',
  browse_button : 'pickfiles', // you can pass an id...
  container: document.getElementById('container'), // ... or DOM Element itself
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