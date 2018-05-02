<?php
  session_start();
  require './connection.php';

  $suggestion = $_POST['suggestion'];
  $topCharacter = $_POST['character'];
  $topGenre = $_POST['genre'];
  $id = $_SESSION['UserID'];

  $sql ="UPDATE `user_table` SET `user_character`='$topCharacter',`user_genre`='$topGenre',`suggestion`='$suggestion' WHERE `user_id` = $id;";
  
  // After it takes you back to the pending table
  if ($conn->query($sql) === TRUE) {
    header("Location: ../index.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  exit();
?>