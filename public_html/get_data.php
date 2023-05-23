<?php
    session_start();
    if ($_SESSION['valid'] === true)
    {
     
    }
    else
    {
         //header("Location: http://www.cc.puv.fi/~e2203060/ketterat/museo/index.php");
         header("Location: http://www.cc.puv.fi/~e2203051/ketterat/museo/index.php");
    }

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

    
    // format dates to ISO format  yyyy-mm-dd before sending to javascript handling
    foreach ($json as $keys => $value) 
    {
        foreach ($value as $subkey => $subvalue)
        {   
            
            if($subkey == "time")
            {
                $year = substr($subvalue, 4, 4);
                
                $month = substr($subvalue, 2, 2);
                $day = substr($subvalue, 0, 2);

                $subvalue = $year. '-' . $month. '-' . $day;
                $json[$keys][$subkey] = $subvalue;

            }
        }
        
    }
    
    // release file handle
    fclose($fp);
    
    // encode array to json
    $JSON_data =  json_encode($json);
    echo $JSON_data;

