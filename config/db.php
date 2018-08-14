<?php
  //create connection
  $conn = mysqli_connect('localhost','root','','styleblog');

  // check connection
  if(mysqli_connect_errno()){
    // connection failed
    echo 'Failed to connect to mysql' . mysqli_connect_errno();
  }
?>