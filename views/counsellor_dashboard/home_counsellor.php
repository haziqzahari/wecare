<?php

  // include 'session.php';
  include 'database.php';
  session_start();
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>WeCare</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link rel="stylesheet" href="counsellor_dashboard.css">

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
      margin-top: 40px;
      margin-bottom:20px;
      padding: 8px;
      width: 95%;
      box-shadow: 3px 3px 5px grey
    }

    .link_box{
      border:1px solid #DDDDDD;
      border-radius: 5px;
      margin-top: 30px;
      margin-bottom:20px;
      padding: 8px;
      width: 90%;
      height: 280px;
      box-shadow: 3px 3px 5px grey
    }

    .link_text{
      font-size: 32px;
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
      <hr style="width: 80%">

      <a class="active" href="home_counsellor.php">Home</a>
      <a href="pending_appointment.php">Manage Appointment</a>
      <a href="../counsellor_dashboard/counsellor_createform.php">Psychometric Test</a>
      

      <hr style="width: 80%">
      <a href="logout.php" style="position: fixed; bottom: 0px; width: 280px">Logout</a>
    </div>
    
</div>

<!-- Page content -->
<div class="content">

  <div class="row text-center">
      <div class="col-md-12">
          <div class="description">
          <p style="font-size: 50px">Welcome to WeCare (Counsellor)</p>
          <hr style="width: 60%">
          <p style="font-size: 14px">You can now easily manage appointment with students and manage your psychometric tests.</p>
          
      </div>  
      </div>
  
</div>

  <div class="row">
    <div class="col-md-6">
      <div class="link_box">
        
        <div class="row text-center">
          <i class="glyphicon glyphicon-calendar fa-5x" style="padding-top: 18px"></i>
        </div>
        <hr style="width: 70%">
        <div class="row text-center" style="">
          <a href="pending_appointment.php" class="btn link_text">Manage Appointment</a>
          <p style="">Manage your appointment with your students.</p>
        </div>

      </div>
    </div>
    <div class="col-md-6">
      <div class="link_box">
          
          <div class="row text-center">
          <i class="glyphicon glyphicon-edit fa-5x" style="padding-top: 18px"></i>
        </div>
        <hr style="width: 70%">
        <div class="row text-center" style="">
          <a href="../counsellor_dashboard/counsellor_createform.php" class="btn link_text">Psychometric Test</a>
          <p style="">Manage your psychometric tests.</p>
        </div>

      </div> 
    </div>
  </div>

</body>
</html>