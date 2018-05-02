<?php
  require './connection.php';

  $id = $_GET['comic_id'];

  $sql = "UPDATE `comic_table` SET `charity` = 1, `owner` = NULL WHERE `comic_id` = $id";

  if ($conn->query($sql) === TRUE) {
    header("Location: ../index.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
?>