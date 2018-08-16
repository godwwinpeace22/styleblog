<?php require_once 'config/db.php' ?>
<?php
  // create query
  $query = 'SELECT * FROM posts ORDER BY id DESC LIMIT 10';
  $query2 = 'SELECT * FROM posts ORDER BY id LIMIT 1';
  // get results
  $result = mysqli_query($conn, $query);
  $result2 = mysqli_query($conn, $query2);

  // fetch data
  $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
  $post = mysqli_fetch_all($result2);
  // free results
  mysqli_free_result($result);
  mysqli_free_result($result2);
  //close connection
  mysqli_close($conn);
  //$posts = json_encode($posts);

?>

  <?php require 'inc/header.php' ?>
  <!-- banner -->
  <div class="banner col-sm-12">
    <div class="darken">
      <div class="container fluid">
        <h1>Lorem Ipsum Dolor Sit Amet Means That Lorem Ipsum Dolor Is Amet</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta illum deleniti eum inventore est aut. Temporibus voluptates voluptas libero, maxime error dicta porro, veritatis voluptatibus repudiandae impedit commodi incidunt laudantium.</p>
        <p><a href="" id="readmore">READ MORE</a></p>
      </div>
    </div>
  </div>

  <!-- main -->
  <div class="col-sm-12 main">
    <div class="col-sm-9 content" style='padding:0px;width:70%;'>
      <div class="col-sm-12" style='background:#fff;padding-top:30px;padding-bottom:20px;'>
        <div class="wideblock col-sm-12">
          <a href='posts.php?id=<?php echo $posts[0]['id'] ?>'><img src="<?php echo $posts[0]['cover_photo']; ?>" alt="img" class="blockimg"></a>
          <h3><a href='posts.php?id=<?php echo $posts[0]['id'] ?>' style='color:#fa4b2a;'><?php echo $posts[0]['title'] ?></a></h3>
          <h4>By <span style='color:#fa4b2a;'><?php echo $posts[0]['author'] ?></span> <span><?php echo $posts[0]['created_at'] ?></span></h4>
          <p><?php echo substr($posts[0]['body'],0,500) .' ...' ?></p>
          <p>Lorek ipsum autem nulla perferendis, tempore in optio vel doloribus.</p>
          <p><a href="posts.php?id=<?php echo $posts[0]['id'] ?>" class="continue">Continue Reading</a></p>
        </div>
      </div>

      <div class="col-sm-12" style='margin-top:10px;background:#fff;padding-top:10px;'>
        <div class="col-sm-12 twoblock">
          <div class="col-sm-6 twoblock1">
            <a href='posts.php?id=<?php echo $posts[1]['id'] ?>'><img src="<?php echo $posts[1]['cover_photo']; ?>" alt="img" class="blockimg"></a>
            <h3 ><a href='posts.php?id<?php echo $posts[1]['id'] ?>' style='color:#fa4b2a;'><?php echo $posts[1]['title'] ?></a></h3>
            <h4>By <span style='color:#fa4b2a;'><?php echo $posts[1]['author'] ?></span> <span><?php echo $posts[1]['created_at'] ?></span></h4>
            <p><?php echo substr($posts[1]['body'],0,200) .' ...' ?></p>
            <p>Lorek ipsum autem nulla perferendis, tempore in optio vel doloribus.</p>
            <p><a href="posts.php?id=<?php echo $posts[1]['id'] ?>" class="continue">Continue Reading</a></p>
          </div>
          <div class="col-sm-6 twoblock2">
            <a href='posts.php?id=<?php echo $posts[2]['id'] ?>'><img src="<?php echo $posts[2]['cover_photo'] ?>" alt="img" class="blockimg"></a>
            <h3><a href='posts.php?id=<?php echo $posts[2]['id'] ?>' style='color:#fa4b2a;'>Lorem Ipsum Title</a></h3>
            <h4>By <span style='color:#fa4b2a;'><?php echo $posts[2]['author'] ?></span> <span><?php echo $posts[2]['created_at'] ?></span></h4>
            <p><?php echo substr($posts[2]['body'],0,200) .' ...' ?></p>
            <p>Lorek ipsum autem nulla perferendis, tempore in optio vel doloribus.</p>
            <p><a href="posts.php?id=<?php echo $posts[2]['id'] ?>"class="continue">Continue Reading</a></p>
          </div>
        </div>
      </div>

      <div class="col-sm-12" style='background:#fff;padding-bottom:20px;min-height:200px;padding-top:10px;margin-top:20px;'>
        <div class="col-sm-12 oneblock">
          <div class="col-sm-6 oneblock1">
            <a href="posts.php?id=<?php echo $posts[3]['id'] ?>"><img src="<?php echo $posts[3]['cover_photo'] ?>" alt="img"></a>
          </div>
          <div class="col-sm-6 oneblock2">
            <h3><a href='posts.php?id=<?php echo $posts[3]['id'] ?>' style='color:#fa4b2a;'><?php echo $posts[3]['title'] ?></a></h3>
            <h4>By <span style='color:#fa4b2a;'><?php echo $posts[3]['author'] ?></span> <span><?php echo $posts[3]['created_at'] ?></span></h4>
            <p><?php echo substr($posts[3]['body'],0,100) .' ...' ?></p>
            
            <p><a href="posts.php?id=<?php echo $posts[3]['id'] ?>" class="continue">Continue Reading</a></p>
          </div>
        </div>
      </div>
      <div class="col-sm-12" style='background:#fff;padding-bottom:20px;min-height:200px;padding-top:10px;margin-top:20px;'>
        <div class="col-sm-12 oneblock">
          <div class="col-sm-6 oneblock1">
            <a href="posts.php?id=<?php echo $posts[4]['id'] ?>"><img src="<?php echo $posts[4]['cover_photo']?>" alt="img"></a>
          </div>
          <div class="col-sm-6 oneblock2">
            <h3><a href='posts.php?id=<?php echo $posts[4]['id'] ?>' style='color:#fa4b2a;'><?php echo $posts[4]['title'] ?></a></h3>
            <h4>By <span style='color:#fa4b2a;'><?php echo $posts[4]['author'] ?></span> <span><?php echo $posts[4]['created_at'] ?></span></h4>
            <p><?php echo substr($posts[0]['body'],0,100) .' ...' ?></p>
            
            <p><a href="posts.php?id=<?php echo $posts[4]['id'] ?>" class="continue">Continue Reading</a></p>
          </div>
        </div>
      </div>
      <div class="col-sm-12" style='background:#fff;padding-bottom:20px;min-height:200px;padding-top:10px;margin-top:20px;'>
        <div class="col-sm-12 oneblock">
          <div class="col-sm-6 oneblock1">
            <a href="posts.php?id=<?php echo $posts[5]['id'] ?>"><img src="<?php echo $posts[5]['cover_photo']; ?>" alt="img" class="blockimg"></a>
          </div>
          <div class="col-sm-6 oneblock2">
            <h3><a href='posts.php?id=<?php echo $posts[5]['id'] ?>' style='color:#fa4b2a;'><?php echo $posts[5]['title'] ?></a></h3>
            <h4>By <span style='color:#fa4b2a;'><?php echo $posts[5]['author'] ?></span> <span><?php echo $posts[0]['created_at'] ?></span></h4>
            <p><?php echo substr($posts[5]['body'],0,100). ' ...' ?></p>
            
            <p><a href="posts.php?id=<?php echo $posts[5]['id'] ?>" class="continue">Continue Reading</a></p>
          </div>
        </div>
      </div>
    </div>
    <?php require('inc/sidebar.php') ?>
  </div>
  <?php include 'inc/footer.php' ?>