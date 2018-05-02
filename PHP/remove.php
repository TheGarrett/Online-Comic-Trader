<?php
  require './connection.php';

  $id = $_GET['comic_id'];

  $sql ="UPDATE `comic_table` SET `charity` = 0, `trade` = 1, `comic_read` = 0 WHERE `comic_id` = $id;";
  
  // After it takes you back to the pending table
  if ($conn->query($sql) === TRUE) {
    header("Location: ../Templates/Admin/AdminPage.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  exit();
?>