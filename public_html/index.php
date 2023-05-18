<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
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

        // login logic to check for right username from file. depending on privileges routes to correct museo site
        if(isset($_POST['submit']))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $filename = "secrets/accounts.txt";

            $fp = fopen($filename, 'r');
            while (! feof($fp)) 
            {

                $data = fgetcsv($fp, 1000, ",");


                if ($data[0] == $username && $data[1] == $password && $data[2] == 1) 
                {
                    header("Location: http://www.cc.puv.fi/~e2203051/ketterat/museo/museo1.php");
                }
                else if ($data[0] == $username && $data[1] == $password && $data[2] == 2) 
                {
                    header("Location: http://www.cc.puv.fi/~e2203051/ketterat/museo/museo2.php");
                }
                else if ($data[0] == $username && $data[1] == $password && $data[2] == 3) 
                {
                    header("Location: http://www.cc.puv.fi/~e2203051/ketterat/museo/museo3.php");
                }
                else if ($data[0] == $username && $data[1] == $password && $data[2] == 4) 
                {
                    header("Location: http://www.cc.puv.fi/~e2203051/ketterat/museo/museo4.php");
                }
                else if ($data[0] == $username && $data[1] == $password && $data[2] == "admin") 
                {
                    header("Location: http://www.cc.puv.fi/~e2203051/ketterat/museo/admin.php");
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