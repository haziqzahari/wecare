<?php
 
// include("session.php");
include("database.php");
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
  try {

      $stmt = $conn->prepare("INSERT INTO ukmcounselling_students(std_matric,
        std_name, std_college, std_faculty, std_phone,
        std_email, std_password) VALUES(:matric_no, :name, :college, :faculty,
        :phone, :email, :password)");

      // $matric_no = mysqli_real_escape_string($conn,$_POST['matric']);
      // $name = mysqli_real_escape_string($conn,$_POST['name']); 
      // $college = mysqli_real_escape_string($conn,$_POST['college']);
      // $faculty = mysqli_real_escape_string($conn,$_POST['faculty']); 
      // $phone = mysqli_real_escape_string($conn,$_POST['phone']);
      // $email = mysqli_real_escape_string($conn,$_POST['email']); 
      // $password = mysqli_real_escape_string($conn,$_POST['password']);
      // $confirm_password = mysqli_real_escape_string($conn,$_POST['confirm_password']);

      $matric_no = $_POST['matric'];
      $name = $_POST['name'];
      $college = $_POST['college'];
      $faculty =  $_POST['faculty'];
      $phone = $_POST['phone'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $confirm_password = $_POST['confirm_password'];
      $error = "";
     
      $stmt->bindParam(':matric_no', $matric_no, PDO::PARAM_STR);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':college', $college, PDO::PARAM_INT);
      $stmt->bindParam(':faculty', $faculty, PDO::PARAM_STR);
      $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->bindParam(':password', $password, PDO::PARAM_STR);
      
       if ($password == $confirm_password) 
       {
           $stmt->execute();
           header("Location: ../login/login.php");
       }
       else 
       {
            $error = "Password do not match.";
            echo "<div>".$error."</div>";
       }
    
    
     
    
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
 
  $conn = null;
?>




<<!DOCTYPE html>
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

            .title{
                font-size: 50px;
                text-align: center
            }

            html, body {
                background-color: #F5F5F5;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                margin: 0;
                height: 90vh;
                max-height: 90vh;
                width: 1140px;
                max-width: 1140px;
            }

            .register_form {
                background-color: #fff;
                height: 100vh
            }

            .register_title{
                font-size: 20px;
                text-align: center
            }

            .register_header{
                font-size: 35px;
                text-align: center;
                padding-top: 24px;
            }

            .register_input_section{
                padding-left: 40px;
                padding-right: 40px;
                padding-top: 4px;
                padding-bottom: 4px

            }

            .btn_register{
                width: 180px;
                height: 40px;
                border-radius: 80px;
                margin-top:10px;
                background-color: #00B64D;
                color:#fff;
            }
        </style>

    </head>
    <body>
        <?php 
            $error = "";
        ?>
        <div class="row">
            <div class="col-md-8 col-md-offset-3 register_form">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <p class="register_header">WeCare</p>
                        <p class="register_title">Registration Form</p>
                        <hr style="width: 90%">
                    </div>
                </div>
                <form action="" method="POST">
                <div class="row register_input_section">
                    <div class="col-md-8">
                            <div class="form-group login_input" >
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                    </div>
                    <div class="col-md-4">
                            <div class="form-group login_input" >
                                    <label for="matric">Matric No:</label>
                                    <input type="text" class="form-control" id="matric" name="matric" required>
                            </div>
                    </div>
                </div>
                <div class="row register_input_section">
                        <div class="col-md-8">
                                <div class="form-group login_input" >
                                        <label for="email">E-mail Address:</label>
                                        <input type="text" class="form-control" id="email" name="email" required>
                                </div>
                        </div>
                        <div class="col-md-4">
                                <div class="form-group login_input" >
                                        <label for="phone">Phone Number:</label>
                                        <input type="text" class="form-control" id="phone" name="phone" required>
                                </div>
                        </div>
                </div>
                <div class="row register_input_section">
                    <div class="col-md-12">
                            <div class="form-group">
                                    <label for="college">College:</label>
                                    <select class="form-control" id="college" name="college" required>
                                            <option disabled="disabled" selected="selected">Choose college</option>
                                            <option value="Kolej Pendeta Zaba">KOLEJ PENDETA ZABA</option>
                                            <option value="Kolej Ibrahim Yaakub">KOLEJ IBRAHIM YAAKUB</option>
                                            <option value="Kolej Aminuddin Baki">KOLEJ BURHANUDDIN HELMI</option>
                                            <option value="Kolej Ungku Omar">KOLEJ UNGKU OMAR</option>
                                            <option value="Kolej Aminuddin Baki">KOLEJ AMINUDDIN BAKI</option>
                                            <option value="Kolej Keris Mas">KOLEJ KERIS MAS</option>
                                            <option value="Kolej Rahim Kajai">KOLEJ RAHIM KAJAI</option>
                                            <option value="Kolej Ibu Zain">KOLEJ IBU ZAIN</option>
                                            <option value="Kolej Dato Onn">KOLEJ DATO ONN</option>
                                            <option value="Kolej Tun Hussein Onn">KOLEJ TUN HUSSEIN ONN</option>
                                    </select>
                                  </div>
                    </div>
                </div>
                <div class="row register_input_section">
                    <div class="col-md-12">
                            <div class="form-group">
                                    <label for="faculty">College:</label>
                                    <select class="form-control" id="faculty" name="faculty" required>
                                            <option disabled="disabled" selected="selected">Choose faculty</option>
                                            <option value="Fakulti Teknologi Dan Sains Maklumat">FAKULTI TEKNOLOGI DAN SAINS MAKLUMAT</option>
                                            <option value="Fakulti Ekonomi dan Pengurusan">FAKULTI EKONOMI DAN PENGURUSAN</option>
                                            <option value="Fakulti Sains dan Teknologi">FAKULTI SAINS DAN TEKNOLOGI</option>
                                            <option value="Fakulti Sains Sosial dan Kemanusiaan">FAKULTI SAINS SOSIAL DAN KEMANUSIAAN</option>
                                            <option value="Fakulti Pengajian Islam">FAKULTI PENGAJIAN ISLAM</option>
                                            <option value="Fakulti Kejuruteraan dan Alam Bina">FAKULTI KEJURUTERAAN DAN ALAM BINA</option>
                                            <option value="Fakulti Undang-Undang">FAKULTI UNDANG-UNDANG</option>
                                            <option value="Fakulti Pergigian">FAKULTI PERGIGIAN</option>
                                            <option value="Fakulti Sains Kesihatan">FAKULTI SAINS KESIHATAN</option>
                                            <option value="Fakulti Perubatan">FAKULTI PERUBATAN</option>
                                    </select>
                            </div>
                    </div>
                </div>
                <div class="row register_input_section">
                    <div class="col-md-6">
                            <div class="form-group login_input" >
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                    </div>
                    <div class="col-md-6">
                            <div class="form-group login_input" >
                                    <label for="confirm_password">Confirm Password:</label>
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                            </div>
                    </div>
                </div>

                <?php 
                    if($error != ""){
                        echo "<p style="."color:red".">".$error."</p>";
                    }

                ?>

                <div class="form-group row text-center">
                    <button class="btn btn_primary btn_register" type="submit">Submit</button>
                </div>
            </form>
            </div>
        </div>


    </body>
</html>
