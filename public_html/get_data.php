<?php
// php function to convert csv to json format


    // open csv file
    $fname = "data/museodata.txt";
    
    if (!($fp = fopen($fname, 'r'))) {
        die("Can't open file...");
    }
    
    //read csv headers
    $key = fgetcsv($fp,"1024",",");
    
    // parse csv rows into array
    $json = array();
        while ($row = fgetcsv($fp,"1024",",")) {
        // trim whitespaces from data
        $row = array_map('trim', $row);
        // combine key-value pairs
        $json[] = array_combine($key, $row);
    }
    
    // release file handle
    fclose($fp);
    
    // encode array to json
    $JSON_data =  json_encode($json);
    echo $JSON_data;

