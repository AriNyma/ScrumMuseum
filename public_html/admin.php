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
    <script src="https://cdn.jsdelivr.net/npm/chart.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js" defer></script>
    <script src="museum_sales.js" defer></script>
</head>
<body>
    <header>
        <h1> ADMIN PANEL</h1>
        

    </header>

    <div id="main">

        <div id="links">
            <a href="http://www.cc.puv.fi/~e2203051/ketterat/museo/museo1.php">Museo 1 Dash  </a> 
            <a href="http://www.cc.puv.fi/~e2203051/ketterat/museo/museo2.php">Museo 2 Dash  </a>
            <a href="http://www.cc.puv.fi/~e2203051/ketterat/museo/museo3.php">Museo 3 Dash  </a> 
            <a href="http://www.cc.puv.fi/~e2203051/ketterat/museo/museo4.php">Museo 4 Dash  </a>
            <a href="http://www.cc.puv.fi/~e2203051/ketterat/museo/accounts.php"> accounts </a>
        </div>
        
        

        <canvas id="chartscreen" width="200" height="200">  </canvas>

        <div id="datepicker">
        <input type="date" id="start_date">
        <input type="date" id="end_date">
        <button id="filter_button">FILTER</button>
        <button id="clear_button">CLEAR</button>
        </div>

        <div id="databuttons">
            <button type="button" class="button" id="data_button1"> show total sales</button>
            <button type="button" class="button" id="data_button2"> visitors per day</button>
            <button type="button" class="button" id="data_button3"> sales by ticket type</button>
            <button type="button" class="button" id="download_excel_button"> download</button>

        </div>

        <button id="logout" class="logout"> LOGOUT </button>

    </div>

    <footer>
        <p>&copy; SCRUM TEAM </p>

    </footer>
    


</body>

</html>