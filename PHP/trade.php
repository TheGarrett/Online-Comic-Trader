<?php
  session_start();
  require './connection.php';

  $id = $_GET['comic_id'];
  $UserID = $_SESSION['UserID'];

  // Send traded comic to trade pile
  $getUsersComic = "UPDATE `comic_table` SET `trade` = 1, `owner` = NULL, `comic_read` = 0 WHERE `comic_id` = $id";
  $returnedUsersComic = $conn->query($getUsersComic);


  // Get user information
  $getUserData = "SELECT * FROM `user_table` WHERE `user_id` = $UserID";
  $returnedUser = $conn->query($getUserData);

  if ($returnedUser->num_rows > 0) {
    while($ourUser = $returnedUser->fetch_assoc()) {
      // Set the users preferences
      $character = $ourUser["user_character"];
      $genre = $ourUser["user_genre"];
      $suggestion = $ourUser["suggestion"];
    }
  }

  if ($suggestion == 1) {
    // Get comic books of users character preference
    $getTradeComics = "SELECT * FROM `comic_table` WHERE `trade` = 1 AND `comic_lead_character` = '$character' ORDER BY RAND() LIMIT 1";
    $returnedComics = $conn->query($getTradeComics);

    if ($returnedComics->num_rows > 0) {
      while($comics = $returnedComics->fetch_assoc()) {
        $traded = $comics["comic_id"];

        $sql = "UPDATE `comic_table` SET `trade` = 0, `owner` = $UserID WHERE `comic_id` = $traded";

        if ($conn->query($sql) === TRUE) {
         header("Location: ../index.php");
        } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
        }
      }
    } else {
      // Get comic books of users genre preference
      $getGenres = "SELECT * FROM `comic_table` WHERE `trade` = 1 AND `comic_genre` = '$genre' ORDER BY RAND() LIMIT 1";
      $returnedGenres = $conn->query($getGenres);

      if ($returnedGenres->num_rows > 0) {
        while($comicGenre = $returnedGenres->fetch_assoc()) {
          $traded = $comicGenre["comic_id"];

          $sql = "UPDATE `comic_table` SET `trade` = 0, `owner` = $UserID WHERE `comic_id` = $traded";

          if ($conn->query($sql) === TRUE) {
          header("Location: ../index.php");
          } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
          }
        }
      }
    }
  } else {
    // Get comic books of users genre preference
    $getRandom = "SELECT * FROM `comic_table` WHERE `trade` = 1 ORDER BY RAND() LIMIT 1";
    $returnedRandom = $conn->query($getRandom);

    if ($returnedRandom->num_rows > 0) {
      while($randomComic = $returnedRandom->fetch_assoc()) {
        $traded = $randomComic["comic_id"];

        $sql = "UPDATE `comic_table` SET `trade` = 0, `owner` = $UserID WHERE `comic_id` = $traded";

        if ($conn->query($sql) === TRUE) {
         header("Location: ../index.php");
        } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
        }
      }
    }
  }
?>