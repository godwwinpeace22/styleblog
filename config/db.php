<?php
  //create connection
  //$conn = mysqli_connect('localhost','root','','styleblog');
  $server = getenv('database_host');
  $username = getenv('database_username');
  $password = getenv('database_password');
  $db = getenv('database_name');

  $conn = mysqli_connect($server,$username, $password, $db);

  // check connection
  if(mysqli_connect_errno()){
    // connection failed
    echo 'Failed to connect to mysql' . mysqli_connect_errno();
  }
?>