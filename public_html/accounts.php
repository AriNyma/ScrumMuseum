<?php
   session_start();
   if ($_SESSION['valid'] === true && $_SESSION['access'] === "admin")
   {
    
   }
   else
   {
        //header("Location: http://www.cc.puv.fi/~e2203060/ketterat/museo/index.php");
        header("Location: http://www.cc.puv.fi/~e2203051/ketterat/museo/index.php");
   }
   
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Admin Dash</title>

</head>
<body>
    <header>
        <h1> ACCOUNT PANEL</h1>
        

    </header>

    <div id="main2">
        <div id="main3">
        <?php
            $filename = "secrets/accounts.txt";
            $fp = fopen($filename, 'r');
            $counter = 0;

            while (! feof($fp)) 
            {
                $counter++;

                $data = fgetcsv($fp, 1000, ",");
                if (!empty($data[0]))
                {
                    echo '<p>'. 'Account '. $counter . ':   '. $data[0]  . '--             Access:  '. $data[2] .'</p>';
                }

                
            }

            
        ?>
        </div>

        <div>
        <form id="form1" action="#" method="post" onsubmit="post">
            <h1>Password Change</h1>
            <label>Username: </label>
            <input type="text" placeholder="Enter Username"     id="username" required name="username">
            <label>Old Password: </label>
            <input type="password" placeholder="Enter Old Password"  id="password_old" required name="password_old">
            <label>New Password: </label>
            <input type="password" placeholder="Enter New Password"  id="password_new" required name="password_new">
            <input type="submit" name="submit" value="Change">
            <?php
        
            if(isset($_POST['submit']))
            {
                $username = $_POST['username'];
                $password_old = $_POST["password_old"];
                $password_new = $_POST["password_new"];
                $counter = 0;
                
                $hashed_password = password_hash($_POST["password_new"], PASSWORD_DEFAULT);
            
                $filename = "secrets/accounts.txt";
                
                $output_data = fopen('secrets/temp.txt', 'w');
                $input_data = fopen($filename, 'r');
                while (! feof($input_data)) 
                {

                    $data = fgetcsv($input_data, 255, ",");
                    if ($username == $data[0] && password_verify($password_old, $data[1]) == 1 && password_verify($_POST["password_new"], $hashed_password) == 1)
                    {
                        //echo "here";
                        $data[1] = $hashed_password;
                        $counter++;
                    }
                    fputcsv($output_data, $data);
                    
                }
                fclose($input_data);
                fclose($output_data);

                unlink('secrets/accounts.txt');
                rename('secrets/temp.txt', 'secrets/accounts.txt');
                if ($counter == 0)
                {
                    echo '<p> please check username and password </p>';
                }
                else if ($counter == 1)
                {
                    echo '<p> SUCCESS </p>';
                }
            }
            
            ?>
        </form>
        </div>
        
        



    </div>

    <footer>
         <a href="http://www.cc.puv.fi/~e2203051/ketterat/museo/admin.php"> Back to Admin Dash  </a> 
    </footer>

    

    
    


</body>

</html>