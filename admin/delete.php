<?php
  session_start();
  if(isset($_GET['logout']) && $_GET['logout'] == true){
    // remove all session variables
    session_unset(); 
    // destroy the session 
    session_destroy();
  }
  // check if admin is logged in
  if(!isset($_SESSION['admin'])){

    //redirect to login page
    header("location:login.php");

    // Terminate execution of scripts
    exit(); // or die()
  }
?>
<?php require('../config/db.php'); ?>
<?php
  //get post id from query string
  if(isset($_GET['id'])){
    //global $id;
    $id = $_GET['id'];


    //create query
    $query = 'DELETE FROM posts WHERE id=' . $id;
    //get results
    $result = mysqli_query($conn, $query);
    $success = 'Post deleted successfuly';
    //close connection
    mysqli_close($conn);
  }
?>
<?php require('inc/header.php') ?>
<div class="container">
<?php if(isset($success)): ?>
  <p class='alert alert-success text-center'><?php echo $success; ?></p>
<?php endif ?>
<?php if(isset($failure)): ?>
  <p class='alert alert-danger text-center'><?php echo $failure; ?></p>
<?php endif ?>
</div>