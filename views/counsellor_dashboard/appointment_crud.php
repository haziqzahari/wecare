<?php
 
include_once 'database.php';
//include_once 'session.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
if (isset($_POST['create'])) {
 
  try {
 
      $stmt = $conn->prepare("INSERT INTO ukmcounselling_student_schedule(matric_num,title) VALUES(:mat_num, :title)");
     
      $stmt->bindParam(':mat_num', $matric_num, PDO::PARAM_STR);
      $stmt->bindParam(':title', $title, PDO::PARAM_STR);
      
       
    $mat_num = $_POST['mat_num'];
    
    
    
    $stmt->execute();
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Update
if (isset($_POST['update'])) {
 
  try {
 
      $stmt = $conn->prepare("UPDATE ukmcounselling_student_schedule SET matric_num = :mat_num, title = :title WHERE matric_num = :oldmat_num");
     
      $stmt->bindParam(':mat_num', $matric_num, PDO::PARAM_STR);
      $stmt->bindParam(':title', $title, PDO::PARAM_STR);     
      $stmt->bindParam(':oldmatric_num', $oldmatric_num, PDO::PARAM_STR);
       
    $mat_num = $_POST['matr_num'];
    
    $oldmatric_num = $_POST['oldmat_num'];
     
    $stmt->execute();
 
    header("Location: pending_appointment.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Delete
if (isset($_GET['delete'])) {
 
  try {
 
      $stmt = $conn->prepare("DELETE FROM ukmcounselling_student_schedule WHERE matric_num = :mat_num");
     
      $stmt->bindParam(':mat_num', $matric_num, PDO::PARAM_STR);
       
    $matric_num = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: pending_appointment.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Edit
if (isset($_GET['edit'])) {
 
  try {
 
      $stmt = $conn->prepare("SELECT * FROM ukmcounselling_student_schedule WHERE matric_num = :mat_num");
     
      $stmt->bindParam(':mat_num', $mat_num, PDO::PARAM_STR);
       
    $mat_num = $_GET['edit'];
     
    $stmt->execute();
 
    $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
  $conn = null;
?>