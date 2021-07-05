<?php 

  // include 'session.php';
include 'database.php'

 ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>WeCare</title>

        <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link rel="stylesheet" href="counsellor_dashboard.css">

    <link rel="stylesheet" href="calendar/calendar.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <style type="text/css">

      html, body {
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
    }

    .description{
      border:1px solid #DDDDDD;
      border-radius: 5px;
      margin-top: 30px;
      margin-bottom:20px;
      font-size: 20px;
      box-shadow: 1px 1px 5px grey;
      padding: 10px
    }

    .content{
      max-height: 100vh
    }
    </style>

   


</head>
<body>

  <div class="sidebar text-center">
    <div class="col">
      <p style="padding-top: 20px; font-size: 28px">WeCare</p>
      <hr style="width: 90%">

      <a href="home_counsellor.php">Home</a>
      <a class="active" href="modal.php">Manage Appointment</a>
      <a href="counsellor_createform.php">Psychometric Test</a>
      

      <hr style="width: 80%">
      <a href="logout.php" style="position: fixed; bottom: 0px; width: 280px">Logout</a>
    </div>
    
</div>

<!-- Page content -->
<div class="content">

    <div class="row text-center">
      <div class="col-md-6 col-md-offset-3">
          <div class="description">
          <p>Manage Your Schedule</p>
          
      </div>  
      </div>
      
    </div>
    <div class="row">
      <?php

      include('calendar/calendar.php');
 
      $calendar = new Calendar();
 
      echo $calendar->show();
    ?>  
    </div>

    

</div>

</body>
</html>