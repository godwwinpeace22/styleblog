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

  require_once '../vendor/autoload.php';

  \Cloudinary::config(array( 
    "cloud_name" => getenv('cloud_name'), 
    "api_key" => getenv('api_key'), 
    "api_secret" => getenv('api_secret') 
  ));

  if(filter_has_var(INPUT_POST, 'submit')){
    $title = $_POST['title'];
    $author = $_POST['author'];
    $cover_photo = $_FILES['cover_photo']['tmp_name'];
    $body = $_POST['body'];

    // verify that file is image
    if(getimagesize($_FILES['cover_photo']['tmp_name']) != false){
      // file is image
     $cover_photo =  \Cloudinary\Uploader::upload($cover_photo, 
      array("folder" => "phpsamples", 'overwrite'=>TRUE));
      $cover_photo = $cover_photo['url'];
      $newrecord = "'$title', '$cover_photo','$body','$author'";
      $sql = 'INSERT INTO posts (title,cover_photo,body,author) VALUES (' . $newrecord . ')';

      if(mysqli_query($conn, $sql)){
        global $success;
        $success = "post inserted successfully.";
      }
      else{
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
      }

    }else{
      // file is not image
      global $failure;
      $failure = 'Only image uploads are accepted';
    }
    
  }
  

  
?>

<?php require('inc/header.php') ?>
  <div class='container' style='margin-top:10%;'>
    <h3>Add A Blog Post</h3>
    <div class="col-sm-6 col-sm-offset-3">
      <?php if(isset($success)): ?>
        <p class='alert alert-success text-center'><?php echo $success; ?></p>
      <?php endif ?>
      <?php if(isset($failure)): ?>
        <p class='alert alert-danger text-center'><?php echo $failure; ?></p>
      <?php endif ?>
      </p>
      <hr>
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method='POST' enctype="multipart/form-data">
        <div class="form-group">
          <input type="text" name="title" id="title" class="form-control" placeholder="Title" required>
        </div>
        <div class="form-group">
          <input type="text" name="author" class="form-control" placeholder="Author" required>
        </div>
        <div class="form-group">
          <label for="cover_photo">Cover Photo</label>
          <input type="file" id="cover_photo" name="cover_photo" class="form-control" required accept='.png, .jpg, .jpeg'>
        </div>
        <div class="form-group">
          <textarea name="body" rows='8' class="form-control" placeholder="Post body" required></textarea>
        </div>
        <div class="form-group">
          <input type="submit" name='submit' value='Submit Post' class='btn btn-primary form-control'>
        </div>
        
      </form>
    </div>
  </div>
</body>
</html>