
<div class="col-sm-3 sidebar" style='width:30%;'>
  <div class="col-sm-12 sidebar-inner">
    <div class="col-sm-12" style='margin-bottom:20px;color:#fa4b2a;'>
      <h3>Recent Posts</h3>
    </div>
    
    <?php foreach($posts as $post): ?>
      <div class='col-sm-12' style=';'>
        <a href='posts.php?id=<?php echo $post['id'] ?>'><img id='sidebar_img' src="<?php echo $post['cover_photo'] ?>" alt="caption" class="avatar"></a>
        <p><a href='posts.php?id=<?php echo $post['id'] ?>'><?php echo $post['title'] ?></a></p>
        <hr>
      </div>
    <?php endforeach ?>
  </div>
</div>