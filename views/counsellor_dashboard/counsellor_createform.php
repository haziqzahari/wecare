<?php

  // include 'session.php';
  include 'database.php';
  include 'psychometric_crud.php';
  
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

    .description{
      border:1px solid #DDDDDD;
      border-radius: 5px;
      margin-top: 30px;
      margin-bottom:20px;
      padding:10px;
    }

    .row{
    	margin-bottom: 15px;
    }
    </style>

    <script>
      function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("input_form");
        filter = input.value.toUpperCase();
        table = document.getElementById("table_form");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[1];
          if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
            } else {
               tr[i].style.display = "none";
            }
          }       
         }
      }
</script>

</head>
<body>

	<div class="sidebar text-center">
    <div class="col">
      <p style="padding-top: 20px; font-size: 28px">WeCare</p>
      <hr style="width: 80%">

      <a href="home_counsellor.php">Home</a>
      <a href="pending_appointment.php">Manage Appointment</a>
      <a class="active" href="../counsellor_dashboard/counsellor_createform.php">Psychometric Test</a>
      

      <hr style="width: 80%">
      <a href="logout.php" style="position: fixed; bottom: 0px; width: 280px">Logout</a>
    </div>
    
</div>

<!-- Page content -->
<div class="content">

  	 <div class="row text-center" style="margin-bottom: 10px">
      <div class="col-md-10 col-md-offset-1">
          <div class="description">
          <p style="font-size: 24px">Psychometric Forms</p>
          <hr style="width: 70%">
          <p style="font-size: 14px">Choose your psychometric test category below.</p>
          
      </div>  
      </div>

    <div class="row">
    	<div class="col-md-10">
    	<form action="counsellor_createform.php" method="post" class="form-horizontal">

  		<div class="form-group">
        <label for="form_id" class="col-md-3 control-label">Form ID</label>
    		<div class="col-md-9">
      				<input name="fid" type="text" class="form-control" id="form_id" placeholder="Form ID" value="<?php if(isset($_GET['edit'])) echo $editrow['form_id']; ?>" required>
    		</div>
  		</div>

  <div class="form-group">
          <label for="title" class="col-md-3 control-label">Title</label>
      <div class="col-md-9">
          <input name="title" type="text" class="form-control" id="title" placeholder="Title" value="<?php if(isset($_GET['edit'])) echo $editrow['title']; ?>" required>
      </div>
  </div>

  
  <div class="form-group">
    <div class="col-md-offset-3 col-sm-9">
      <?php if (isset($_GET['edit'])) { ?>
      <input type="hidden" name="oldfid" value="<?php echo $editrow['form_id']; ?>">
      <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
          <?php } else { ?>
          <button class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
          <?php } ?>
          <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
    </div>
  </div>
    </form>
    	</div>
    </div>

  	<div class="row">
  		
  	</div>

  	 <div class="row">
      <div class="col-md-10 col-md-offset-1">
        
        <table class="table table-striped table-bordered" id="table_form">
        <tr>
          <td colspan="10" align="right"><input type="text" name="search_formid" placeholder="Search form" class="form-control" style="width: 40%;" id="input_form" onkeyup="myFunction()"></td>  
        </tr>

        <tr>
        <td>Form ID</td>
        <td>Title</td>
        <td></td>
        
      </tr>
      <?php
      // Read
      $per_page = 10;
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM ukmcounselling_psychometric");
          // $stmt = $conn->prepare("select * from ukmcounselling_psychometric LIMIT $start_from, $per_page");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>   
      <tr>
        <td><?php echo $readrow['form_id']; ?></td>
        <td><?php echo $readrow['title']; ?></td>
        
        <td>
          <a href="counsellor_managequestion.php?fid=<?php echo $readrow['form_id']; ?>" class="btn btn-warning btn-xs" role="button">Details</a>
          <a href="counsellor_createform.php?edit=<?php echo $readrow['form_id']; ?>" class="btn btn-success btn-xs" role="button">Edit</a>
          <a href="counsellor_createform.php?delete=<?php echo $readrow['form_id']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
        </td>
      </tr>
      <?php } ?>
 
    </table>
      </div>
    </div>
  
</div>


  </div>

</body>
</html>