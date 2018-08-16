<?php require_once 'config/db.php' ?>
<?php
  // get post id from query string
  $postId = $_GET['id'];
  // create query
  $query = 'SELECT * FROM posts ORDER BY id DESC LIMIT 10';
  $query2 = 'SELECT * FROM posts WHERE id=' . $postId;
  // get results
  $result = mysqli_query($conn, $query);
  $result2 = mysqli_query($conn, $query2);

  // fetch data
  $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
  $currPost = mysqli_fetch_all($result2, MYSQLI_ASSOC);
  // free results
  mysqli_free_result($result);
  mysqli_free_result($result2);
  //close connection
  mysqli_close($conn);
  //$posts = json_encode($posts);
  

?>

<?php require  'inc/header.php' ?>
<!-- banner -->
<div class="bannersmall col-sm-12" style="padding:0;height:250px;background-image:url('http://res.cloudinary.com/unplugged/image/upload/c_scale,w_980/v1534246745/banner.jpg');background-position:top;background-size:cover;">
  <div class="darken"></div>
</div>

<div class="col-sm-12 main">
    <div class="col-sm-9 content" style='padding:0px;width:70%;'>
      <div class="col-sm-12" style='background:#fff;padding-top:30px;padding-bottom:20px;'>
        <div class="wideblock col-sm-12">
          <img src="<?php echo $currPost[0]['cover_photo'] ?>" alt="img" class="blockimg">
          <h3 style='color:#fa4b2a;'><?php echo $currPost[0]['title'] ?></h3>
          <h4>By <span style='color:#fa4b2a;'><?php echo $currPost[0]['author']; ?></span> <span><?php echo $currPost[0]['created_at'] ?></span></h4>
          <p><?php echo $currPost[0]['body']; ?></p>
          <p>Lorek ipsum autem nulla perferendis, tempore in optio vel doloribus.</p>
          
        </div>
      </div>
    </div>

    <!-- sidebar -->
    <?php require('inc/sidebar.php') ?>
  </div>