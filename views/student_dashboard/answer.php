<?php 
  
  include 'database.php';
  include 'answer_crud.php'

 ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>WeCare</title>

        <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link rel="stylesheet" href="student_dashboard.css">

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
      padding:10px;
    }

    




    </style>
</head>
<body>

  <div class="sidebar text-center">
    <div class="col">
      <p style="padding-top: 20px; font-size: 28px">WeCare</p>
      <hr style="width: 80%">

      <a href="home_student.php">Home</a>
      <a href="student_calendar.php">Book Appointment</a>
      <a class="active" href="student_chooseform.php">Psychometric Test</a>
      

      <hr style="width: 80%">
      <a href="logout.php" style="position: fixed; bottom: 0px; width: 280px">Logout</a>
    </div>
    
</div>

<!-- Page content -->
<div class="content">

     <div class="row text-center">
      <div class="col-md-12">
          <div class="description">
          <p style="font-size: 40px">Psychometric Test</p>
      </div>  
      </div>

    <div class="row">
      <div class="col-md-12" style="padding: 20px">
          
          <table class="w3-table w3-bordered">


      <?php
      // Read
    $per_page = 5;
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM ukmcounselling_psychometric_form WHERE form_id=:fid");
          // $stmt = $conn->prepare("SELECT * FROM ukmcounselling_psychometric_form LIMIT $start_from, $per_page");

          $fid = $_GET['fid'];
          $stmt->bindParam(':fid', $fid, PDO::PARAM_STR);
            
        $stmt->execute();
        $readrow=$stmt->fetchAll();

      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();

      }
      $num=1;

      ?>

      <div class="row">
        <div class="col-md-12" style="padding: 10px">
          
          <form action="" method="post">
      <table border='1' class="table table-striped table-bordered" style="">

        <tr>
          <td colspan="10"><div class="form-group"><input type="text" name="std_matric" class="form-control" style="width: 30%" placeholder="Fill in your matric number"></div></td>
        </tr>

         <tr><th>No.</th>
              <th>Questions</th>
              <th colspan="10">Answer</th>

            </tr>

      <?php
      foreach($readrow as $result => $data) if ($num <= count($readrow)) { ?>

         
        <tr>
        <div class="form-group">
        <td><input type="hidden" name="num" value="<?php echo $num; ?>"><?php echo $num.".";?></td>
        
        <td><input type="hidden" name="question_id" value="<?php echo $data['question_id']; ?>"><?php echo $data['question']; ?></td>
        <td><input type="radio" name="answer<?php echo $num; ?>" value="<?php echo $data['answer_1']; ?>" /><?php echo $data['answer_1']; ?></td>
        <td><input type="radio" name="answer<?php echo $num; ?>" value="<?php echo $data['answer_2']; ?>" /><?php echo $data['answer_2']; ?></td>
        <td><input type="radio" name="answer<?php echo $num; ?>" value="<?php echo $data['answer_3']; ?>" /><?php echo $data['answer_3']; ?></td>
        <td><input type="radio" name="answer<?php echo $num; ?>" value="<?php echo $data['answer_4']; ?>" /><?php echo $data['answer_4']; ?></td>
        <td><input type="radio" name="answer<?php echo $num; ?>" value="<?php echo $data['answer_5']; ?>" /><?php echo $data['answer_5']; ?></td>
      </div>
        </tr>
    
       

        <?php $num++; }
      
      ?>
         </table>
        
       
  <div class="form-group">
    <button class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
  </div>
</form>
        </div>
      </div>
           
</div>
       
      </div>
    </div>
  
</div>

</body>
</html>