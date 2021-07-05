<?php
   include('database.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"SELECT std_matric as username FROM ukmcounselling_students WHERE std_matric='$username' UNION SELECT counsellor_id as username FROM ukmcounselling_counsellor WHERE counsellor_id='$username' UNION SELECT admin_id as username FROM ukmcounselling_admin WHERE admin_id='$username'");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_user'])){
      header("location: http://lrgs.ftsm.ukm.my/users/a163388/wecare_deliver/views/auth/login.php");
      die();
   }
?>