<?php
    

  include('database.php');
  // include('session.php');


   $error ="";
   // session_start();
   

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $username = mysqli_real_escape_string($conn,$_POST['username']);
      $password = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT std_matric, std_password FROM ukmcounselling_students WHERE std_matric='$username' AND std_password='$password' UNION SELECT counsellor_id, counsellor_password FROM ukmcounselling_counsellor WHERE counsellor_id='$username' AND counsellor_password='$password' UNION SELECT admin_id, admin_password FROM ukmcounselling_admin WHERE admin_id='$username' AND admin_password='$password'";
      
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      $error = "";
     
      // If result matched $myusername and $mypassword, table row must be 1 row
		

      if($count == 1) {
          var_dump($username);
         	if(strpos($username, 'A') === 0){
         		// $_SESSION['login_user'] = $username;
         		header("location: ../student_dashboard/home_student.php");
         	}

         	if(strpos($username, 'D') === 0){
         		$_SESSION['login_user'] = $username;
         		header("location: ../admin_dashboard/index.html");
         	}

         	if(strpos($username, 'C') === 0){
         		$_SESSION['login_user'] = $username;
         		header("location: ../counsellor_dashboard/home_counsellor.php");
         	}
         	$error="";
         	
      	}else {
         $error = "Your username or password is invalid";
      }
   }
?> 

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>WeCare</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


        <style>
            .content{
                align-self: center
            }

            .login{
                width: 50%;
                margin-top: 100px;

            }

            .title{
                font-size: 50px;
                text-align: center
            }

            .login_form{
                background-color: #fff;
                height: 100vh
            }

            html, body {
                background-color: #F5F5F5;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                margin: 0;
                height: 90vh;
                max-height: 90vh
            }

            .card_style{
                border-radius:10px
            }

            .login_header{
                font-size: 50px;
                text-align: center;
                padding-top: 24px;
                padding-bottom: 10px
            }

            .login_input_section{
                margin-top: 40px
            }

            .login_input{
                margin-bottom: 40px
            }

            .btn_register{
                border: none;
                color: #00A2DA;
                font-size: 14px;
                text-align: center
            }

            .btn_login{
                background-color: #00B64D;
                color: #fff;
                border-radius: 20px;
                width: 120px;
                height: 40px;
                margin-top: 18px
            }

            .login_footer{
                margin-top: 40px
            }
        </style>

    </head>
    <body>
        <div class="row">
            <div class="col-md-6 col-md-offset-3 login_form">
                <div class="row text-center">
                    <p class="login_header"><strong>WeCare</strong></p>
                    <p style="font-size:18px">We'll Keep You Moving Forward</p>
                    <hr style="width: 60%">
                </div>
                <form action="" method="POST">
                  
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 login_input_section">
                                <div class="form-group login_input" >
                                        <label for="id">Matric No. / Staff ID:</label>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" required autofocus>

                                </div>
                                <div class="form-group login_input">
                                        <label for="password">Password:</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                                </div>
                                <?php
                                  if(isset($_SESSION["error"])){
                                    $error = $_SESSION["error"];
                                    echo "<span>$error</span>";
                                  }
                                ?>  
                        </div>

                    </div>
                    <div class="row text-center">
                        <a class="btn btn_default btn_register" href="../auth/registration.php">Don't Have an Account? Register Now!</a>
                    </div>
                    <div class="form-group row text-center">
                        <button class="btn btn_default btn_login" type="submit">Login</button>
                    </div>
                </form>

                <div class="row text-center login_footer">
                    <hr style="width:60%">
                    <p>WeCare | This website is designed by Sapphire.</p>
                </div>
            </div>
        </div>



    </body>
</html>
