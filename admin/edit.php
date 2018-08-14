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
    require_once '../vendor/autoload.php';
    // configure cloudinary
    \Cloudinary::config(array( 
      "cloud_name" => getenv('cloud_name'), 
      "api_key" => getenv('api_key'), 
      "api_secret" => getenv('api_secret') 
    ));

    if(isset($_POST['submit'])){ // check that form is submitted
      // check that form is not empty
      if(isset($_POST['title']) && isset($_POST['author']) && isset($_FILES['cover_photo']) && isset($_POST['body'])){
        $title = $_POST['title'];
        $author = $_POST['author'];
        $cover_photo = $_FILES['cover_photo']['tmp_name'];
        $body = $_POST['body'];
        $id = $_GET['id'];

        // verify file is image
        if(getimagesize($_FILES['cover_photo']['tmp_name']) != false){
          $cover_photo =  \Cloudinary\Uploader::upload($cover_photo, 
          array("folder" => "phpsamples", 'overwrite'=>TRUE));
          $cover_photo = $cover_photo['url'];
          $ab = "title='$title', cover_photo='$cover_photo', body='$body',author='$author'";

          $update = 'UPDATE Posts SET ' . $ab . ' WHERE id = ' .$id;
          if(mysqli_query($conn, $update)){
            global $success;
            $success = "post updated successfully.";
          }
          else{
              echo "ERROR: Could not execute $update. " . mysqli_error($conn);
          }
        }
        
      }else{
        global $failure;
        $failure = 'Please provide required fields';
      }
      
    }
    
    



?>

<?php
  //get post id from query string
  if(isset($_GET['id'])){
    //global $id;
    $id = $_GET['id'];


    //create query
    $query = 'SELECT * FROM posts WHERE id=' . $id;
    //get results
    $result = mysqli_query($conn, $query);

    //fetch data
    $post = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // free results
    mysqli_free_result($result);
    //close connection
    mysqli_close($conn);
  }
?>
<?php require('inc/header.php') ?>
  <div class="col-sm-12">
    <p class="btn btn-default"><a href="delete.php?id=<?php echo $post[0]['id'] ?>">Delete Post</a></p>
  </div>
  <div class='container' style='margin-top:10%;'>
    <h3>Edit blogpost</h3>
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
          <input type="text" name="title" id="title" value="<?php echo $post[0]['title'] ?>" class="form-control" placeholder="Title" required>
        </div>
        <div class="form-group">
          <input type="text" name="author" value="<?php echo $post[0]['author'] ?>" class="form-control" placeholder="Author" required>
        </div>
        <div class="form-group">
          <label for="cover_photo">Cover Photo</label>
          <input type="file" id="cover_photo" name="cover_photo" class="form-control" required accept='.png, .jpg, .jpeg'>
        </div>
        <div class="form-group">
          <textarea name="body" rows='8' id="textarea" class="form-control" placeholder="Post body" required><?php echo $post[0]['body'] ?></textarea>
        </div>
        <div class="form-group">
          <input type="submit" name='submit' value='Submit Post' class='btn btn-primary form-control'>
        </div>
        
      </form>
    </div>
  </div>
</body>
</html>