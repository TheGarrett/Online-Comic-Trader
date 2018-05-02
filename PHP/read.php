<?php
  require './connection.php';

  $id = $_GET['comic_id'];

  $sql = "UPDATE `comic_table` SET `comic_read` = 1 WHERE `comic_id` = $id";

  if ($conn->query($sql) === TRUE) {
    header("Location: ../index.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
?>