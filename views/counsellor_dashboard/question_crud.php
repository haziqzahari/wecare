<?php
 
include_once 'database.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
if (isset($_POST['create'])) {
 
  try {
 
      $stmt = $conn->prepare("INSERT INTO ukmcounselling_psychometric_form(form_id,question_id,question,answer_1,answer_2,answer_3,answer_4,answer_5) VALUES(:form_id,:question_id,:question, :answer_1, :answer_2, :answer_3, :answer_4, :answer_5)");
     
      $stmt->bindParam(':form_id', $fid, PDO::PARAM_STR);
      $stmt->bindParam(':question_id', $qid, PDO::PARAM_STR);
      $stmt->bindParam(':question', $question, PDO::PARAM_STR);
      $stmt->bindParam(':answer_1', $answer_1, PDO::PARAM_STR);
      $stmt->bindParam(':answer_2', $answer_2, PDO::PARAM_STR);
      $stmt->bindParam(':answer_3', $answer_3, PDO::PARAM_STR);
      $stmt->bindParam(':answer_4', $answer_4, PDO::PARAM_STR);
      $stmt->bindParam(':answer_5', $answer_5, PDO::PARAM_STR);
      
    
    $fid = $_POST['form_id'];   
    $qid = $_POST['question_id'];
    $question = $_POST['question'];
    $answer_1 = $_POST['answer_1'];
     $answer_2 = $_POST['answer_2'];
      $answer_3 = $_POST['answer_3'];
       $answer_4 = $_POST['answer_4'];
        $answer_5 = $_POST['answer_5'];

    
    
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
 
      $stmt = $conn->prepare("UPDATE ukmcounselling_psychometric_form SET 
        form_id = :fid,
        question_id = :qid,
        question = :question,
        answer_1 = :answer_1,
        answer_2 = :answer_2,
        answer_3 = :answer_3,
        answer_4 = :answer_4,
        answer_5 = :answer_5 
        WHERE question_id = :oldqid");
     
      $stmt->bindParam(':form_id', $fid, PDO::PARAM_STR);
      $stmt->bindParam(':question_id', $qid, PDO::PARAM_STR);
      $stmt->bindParam(':question', $question, PDO::PARAM_STR);
      $stmt->bindParam(':answer_1', $answer_1, PDO::PARAM_STR);
      $stmt->bindParam(':answer_2', $answer_2, PDO::PARAM_STR);
      $stmt->bindParam(':answer_3', $answer_3, PDO::PARAM_STR);
      $stmt->bindParam(':answer_4', $answer_4, PDO::PARAM_STR);
      $stmt->bindParam(':answer_5', $answer_5, PDO::PARAM_STR);
      
      $stmt->bindParam(':oldqid', $oldqid, PDO::PARAM_STR);
       
   
    $fid = $_POST['form_id'];
    $qid = $_POST['question_id'];
    $question = $_POST['question'];
    $answer_1 = $_POST['answer_1'];
    $answer_2 = $_POST['answer_2'];
    $answer_3 = $_POST['answer_3'];
    $answer_4 = $_POST['answer_4'];
    $answer_5 = $_POST['answer_5'];
    $oldqid = $_POST['oldqid'];

  

     
    $stmt->execute();
 
    header("Location: counsellor_managequestion.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Delete
if (isset($_GET['delete'])) {
 
  try {
 
      $stmt = $conn->prepare("DELETE FROM ukmcounselling_psychometric_form WHERE question_id = :question_id");
     
      $stmt->bindParam(':question_id', $qid, PDO::PARAM_STR);
       
    $qid = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: counsellor_managequestion.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Edit
if (isset($_GET['edit'])) {
 
  try {
 
      $stmt = $conn->prepare("SELECT * FROM ukmcounselling_psychometric_form WHERE question_id = :qid");
     
      $stmt->bindParam(':qid', $qid, PDO::PARAM_STR);
       
    $qid = $_GET['edit'];
     
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