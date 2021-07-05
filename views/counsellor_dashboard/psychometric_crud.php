<?php
 
include_once 'database.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
if (isset($_POST['create'])) {
 
  try {
 
      $stmt = $conn->prepare("INSERT INTO ukmcounselling_psychometric(form_id,title) VALUES(:fid, :title)");
     
      $stmt->bindParam(':fid', $fid, PDO::PARAM_STR);
      $stmt->bindParam(':title', $title, PDO::PARAM_STR);
      
       
    $fid = $_POST['fid'];
    $title = $_POST['title'];
    
    
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
 
      $stmt = $conn->prepare("UPDATE ukmcounselling_psychometric SET form_id = :fid, title = :title WHERE form_id = :oldfid");
     
      $stmt->bindParam(':fid', $fid, PDO::PARAM_STR);
      $stmt->bindParam(':title', $title, PDO::PARAM_STR);     
      $stmt->bindParam(':oldfid', $oldfid, PDO::PARAM_STR);
       
    $fid = $_POST['fid'];
    $title = $_POST['title'];
    $oldfid = $_POST['oldfid'];
     
    $stmt->execute();
 
    header("Location: counsellor_createform.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Delete
if (isset($_GET['delete'])) {
 
  try {
 
      $stmt = $conn->prepare("DELETE FROM ukmcounselling_psychometric WHERE form_id = :fid");
     
      $stmt->bindParam(':fid', $fid, PDO::PARAM_STR);
       
    $fid = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: counsellor_createform.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Edit
if (isset($_GET['edit'])) {
 
  try {
 
      $stmt = $conn->prepare("SELECT * FROM ukmcounselling_psychometric WHERE form_id = :fid");
     
      $stmt->bindParam(':fid', $fid, PDO::PARAM_STR);
       
    $fid = $_GET['edit'];
     
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