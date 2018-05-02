<?php
  session_start();
  require './connection.php';

  $title = $_POST['comic-title'];
  $description = $_POST['comic-description'];
  $genre = $_POST['comic_genre'];
  $character = $_POST['comic_character'];
  $url = $_POST['comic-url'];
  $id = $_SESSION['UserID'];

  $sql="INSERT INTO `comic_table`(`comic_title`, `comic_description`, `comic_genre`, `comic_lead_character`, `comic_cover`, `charity`, `trade`, `comic_read`, `owner`) VALUES ('$title','$description','$genre','$character','$url',0,0,1,$id)";

  // After it takes you back to the pending table
  if ($conn->query($sql) === TRUE) {
    header("Location: ../index.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  exit();
?>