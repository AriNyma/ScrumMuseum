
<?php
    // clear used session variables
   session_start();
   unset($_SESSION['username']);
   unset($_SESSION['valid']);
   unset($_SESSION['access']);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Museo Login</title>
    <script src="script.js" defer></script>
</head>
<body>   
    
    <div id="main">
 
        <form id="form" action="#" method="post" onsubmit="return verifypassword()">
            <img id="museo_logo" src="media/museo.svg" >
            <h1>Museo Login</h1>
            <label>Username: </label>
            <input type="text" placeholder="Enter Username"     id="username" required name="username">
            <label>Password: </label>
            <input type="password" placeholder="Enter Password"  id="password" required name="password">
            <input type="submit" name="submit" value="Login">
        </form>

    </div>

    <?php

        // login logic to check for right username from file. depending on privileges routes to correct museo site.
        // added hashed passwords using password_verify
        // added session to control access to pages. 
        
        if(isset($_POST['submit']))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $filename = "secrets/accounts.txt";

            $fp = fopen($filename, 'r');
            while (! feof($fp)) 
            {

                $data = fgetcsv($fp, 1000, ",");


                if ($data[0] == $username && password_verify($password, $data[1]) == 1  && $data[2] == 1) 
                {
                    //header("Location: http://www.cc.puv.fi/~e2203060/ketterat/museo/museo1.php");
                    header("Location: http://www.cc.puv.fi/~e2203051/ketterat/museo/museo1.php");

                    $_SESSION['valid'] = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['access'] = "museo1";
                }
                else if ($data[0] == $username && password_verify($password, $data[1]) == 1 && $data[2] == 2) 
                {
                    //header("Location: http://www.cc.puv.fi/~e2203060/ketterat/museo/museo2.php");
                    header("Location: http://www.cc.puv.fi/~e2203051/ketterat/museo/museo2.php");

                    $_SESSION['valid'] = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['access'] = "museo2";
                }
                else if ($data[0] == $username && password_verify($password, $data[1]) == 1 && $data[2] == 3) 
                {
                    //header("Location: http://www.cc.puv.fi/~e2203060/ketterat/museo/museo3.php");
                    header("Location: http://www.cc.puv.fi/~e2203051/ketterat/museo/museo3.php");

                    $_SESSION['valid'] = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['access'] = "museo3";
                }
                else if ($data[0] == $username && password_verify($password, $data[1]) == 1 && $data[2] == 4) 
                {
                    //header("Location: http://www.cc.puv.fi/~e2203060/ketterat/museo/museo4.php");
                    header("Location: http://www.cc.puv.fi/~e2203051/ketterat/museo/museo4.php");

                    $_SESSION['valid'] = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['access'] = "museo4";
                }
                else if ($data[0] == $username && password_verify($password, $data[1]) == 1 && $data[2] == "admin") 
                {
                    //header("Location: http://www.cc.puv.fi/~e2203060/ketterat/museo/admin.php");
                    header("Location: http://www.cc.puv.fi/~e2203051/ketterat/museo/admin.php");

                    $_SESSION['valid'] = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['access'] = "admin";
                }

            }
            fclose($fp);
        }
    ?>


    <footer>
        <p>&copy; SCRUM TEAM </p>

    </footer>


</body>
</html>