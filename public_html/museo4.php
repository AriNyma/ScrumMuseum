<?php
   session_start();
   if ($_SESSION['valid'] === true && ($_SESSION['access'] === "museo4" || $_SESSION['access'] === "admin"))
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
    <title>Museo4 dash</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js" defer></script>
    <script src="script.js" defer></script>
</head>
<body>
    <header>
        <h1> MUSEO 4</h1>
    </header>

    <div id="main">

        <?php
            if ($_SESSION['valid'] === true && $_SESSION['access'] === "admin")
            {
                echo  '  <div id="links">
                            <a href="http://www.cc.puv.fi/~e2203051/ketterat/museo/museo1.php">Museo 1 Dash  </a> 
                            <a href="http://www.cc.puv.fi/~e2203051/ketterat/museo/museo2.php">Museo 2 Dash  </a>
                            <a href="http://www.cc.puv.fi/~e2203051/ketterat/museo/museo3.php">Museo 3 Dash  </a> 
                            <a href="http://www.cc.puv.fi/~e2203051/ketterat/museo/admin.php">Admin Dash  </a> 
                        </div> ';
            }
        ?>
        
        

        <canvas id="chartscreen" width="200" height="200">  </canvas>

        <div id="datepicker">
        <input type="date" id="start_date">
        <input type="date" id="end_date">
        <button id="filter_button">FILTER</button>
        <button id="clear_button">CLEAR</button>
        </div>

        <div id="databuttons">
            <button type="button" class="button" id="data_button1"> show employee sales</button>
            <button type="button" class="button" id="data_button2"> visitors per day</button>
            <button type="button" class="button" id="data_button3"> dataset 3</button>
            <button type="button" class="button" id="data_button4"> dataset 4</button>
        </div>

        <button id="logout" class="logout"> LOGOUT </button>

    </div>

    
    


</body>

</html>