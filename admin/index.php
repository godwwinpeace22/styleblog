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
<?php require('../config/db.php') ?>

<?php

  //create query
  $query = 'SELECT * FROM posts ORDER BY created_at DESC';
  //get results
  $result = mysqli_query($conn, $query);

  //fetch data
  $allposts = mysqli_fetch_all($result, MYSQLI_ASSOC);
  // free results
  mysqli_free_result($result);
  //close connection
  mysqli_close($conn);
?>
<?php require('inc/header.php') ?>
<div class="container">
  <h3>All blog posts</h3>
  <div class="col-sm-10 col-sm-offset-1">
    <?php foreach($allposts as $post): ?>

      <div class="col-sm-4" >
        <div class="col-sm-12 well" style="height:200px;padding:0px;" title='Edit post'>
          <a href="edit.php?id=<?php echo $post['id'] ?>"><img src="<?php echo $post['cover_photo']?>" alt="cover_img" style='width:100%;height:100px;'></a>
         
          <div class="col-sm-12 body">
            <h4><a href="edit.php?id=<?php echo $post['id'] ?>"><?php echo $post['title'] ?></a></h4>
            <p><?php echo substr($post['body'],0, 90) . ' ...'; ?></p>
          </div>
        </div>
      </div>
    <?php endforeach ?>
  </div>
</div>