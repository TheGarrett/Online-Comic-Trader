<?php
  require './connection.php';

  $sql="INSERT INTO `user_table`(`user_email`, `user_password`, `user_character`, `user_genre`, `admin`, `suggestion`) VALUES ('$_POST[email]','$_POST[password]', '$_POST[comic_character]', '$_POST[comic_genre]', 0, 1)";

  // After it takes you back to the pending table
  if ($conn->query($sql) === TRUE) {
    header("Location: ../Templates/Login.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
?>