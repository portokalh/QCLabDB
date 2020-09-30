<?php
    if(isset($_POST['checkbox'])) {  
// Create an array of elements 
        //$name = array('1','3');
        $fp = fopen('mycsv.csv','r');
        $file2 = 'select_write.csv';
        $fp2 = fopen($file2,'w');
        $name = $_POST['checkbox'];
        // echo "You chose the following color(s): <br>";
        $topline = "Animal ID,Brunno,Date,Genotype,Sex,Age,Neuroglancer";
        fputcsv($fp, $topline);
        while (!feof($fp)) {
            $run = fgetcsv($fp,1000,',');
            //echo $run."<br />";
            if (in_array($run[0], $name)) {
                foreach ($run as $myt) {
                    // echo $myt.",";
                }
                // echo "\n";
                //echo $run[0];
                 //echo "yes";
                fputcsv($fp2,$run);
            }
        }
        fclose($fp);
        fclose($fp2);
        // foreach ($name as $color){
        //     echo $color."<br />";
        // }} // end brace for if(isset
        // else {
        // echo "You did not choose a color.";
    }
    // header('Content-type: text/csv');
    // header('Content-Disposition: attachment; filename="select_write.csv"');
    // header('Content-Transfer-Encoding: binary');

    header('Content-type: text/csv');
    header('Content-Disposition: attachment; filename="'.basename($file2).'"');
    header('Content-Transfer-Encoding: binary');
    readfile($file2);

?>