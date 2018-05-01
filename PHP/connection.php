<?php
  $host = 'localhost';
  $user = 'root';
  $pass = 'root';
  $db = 'comic_website_db';

  // Create connection
  $conn = new mysqli($host, $user, $pass, $db);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
?>