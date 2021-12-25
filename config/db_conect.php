<?php
  // connect to database
  $conn = mysqli_connect('localhost', 'edu', 'pizza1234', 'pizzas'); 

  if(!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
  }
?>