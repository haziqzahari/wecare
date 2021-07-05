<?php
 
include_once 'database.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
if (isset($_POST['create'])) {
 
  try {
 
      $stmt = $conn->prepare("INSERT INTO ukmcounselling_answer(std_matric, question_id, answer) VALUES(:std_matric, :question_id, :answer)");
     
      $stmt->bindParam(':std_matric', $std_matric, PDO::PARAM_STR);
      $stmt->bindParam(':question_id', $question_id, PDO::PARAM_STR);
      $stmt->bindParam(':answer', $answer, PDO::PARAM_STR);
      
    $num = $_POST['num'];
    $std_matric = $_POST['std_matric'];
    $question_id = 1;
    
    

    for ($i=1; $i < $num+1; $i++) { 
      # code...
      $answer = $_POST['answer'.$i];

      if ($answer) {
              # code...

              $stmt->execute();
              $question_id++;
            }      
    }

    
    
    
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Update
if (isset($_POST['update'])) {
 
  try {
 
      $stmt = $conn->prepare("UPDATE ukmcounselling_answer SET std_matric = :std_matric, question_id = :question_id, answer = :answer WHERE std_matric = :std_matric");
     
      $stmt->bindParam(':std_matric', $std_matric, PDO::PARAM_STR);
      $stmt->bindParam(':question_id', $question_id, PDO::PARAM_STR);     
      $stmt->bindParam(':answer', $answer, PDO::PARAM_STR);
       
    $std_matric = $_POST['std_matric'];
    $question_id = $_POST['question_id'];
    $answer = $_POST['answer'];
     
    $stmt->execute();
 
    header("Location: answer.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Delete
if (isset($_GET['delete'])) {
 
  try {
 
      $stmt = $conn->prepare("DELETE FROM ukmcounselling_answer WHERE std_matric = :std_matric");
     
      $stmt->bindParam(':std_matric', $std_matric, PDO::PARAM_STR);
       
    $std_matric = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: answer.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Edit
if (isset($_GET['edit'])) {
 
  try {
 
      $stmt = $conn->prepare("SELECT * FROM ukmcounselling_psychometric_form WHERE form_id = :std_matric");
     
      $stmt->bindParam(':std_matric', $std_matric, PDO::PARAM_STR);
       
    $std_matric = $_GET['edit'];
     
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