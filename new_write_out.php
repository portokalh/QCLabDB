<?php 
$myspec = $_GET['genotype']; // $id is now defined
    $file = "mycsv.csv";
    $f = fopen($file, "r");
    $i = 0;
    $file2 = str_replace(".csv", "_new.csv", $file);
    $f2 = fopen($file2,"w");
    $topline = "Animal ID,Brunno,Date,Genotype,Sex,Age,Neuroglancer";
    fputcsv($fp, $topline);
    while(! feof($f)) { 
        $record = fgetcsv($f, 1000, ",");
        if ($record[3] == $myspec || $myspec == '') {
            foreach($record as $field) {
                // echo $field.",";
            }
            fputcsv($f2,$record);
            // echo "<br>";
        }
        $i = $i + 1;
    }
    fwrite($f2,fread($f, filesize($file)));
    fclose($f);
    fclose($f2);
    header('Content-type: text/csv');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Content-Transfer-Encoding: binary');
    readfile($file2);
    // header("Location:./write_download.php");

?>

