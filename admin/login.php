<?php session_start() ?>
<?php require('../config/db.php'); ?>
<?php 
  if(filter_has_var(INPUT_POST, 'username') && filter_has_var(INPUT_POST, 'password')){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userq = 'SELECT * FROM users'; // WHERE username = '. $username . ' AND password='.$password;
    $res = mysqli_query($conn,$userq);

    if(mysqli_query($conn,$userq)){
      //echo 'connect succesfull';
      $user = mysqli_fetch_all($res, MYSQLI_ASSOC);
      mysqli_free_result($res);
      mysqli_close($conn);
      if($user[0]['username'] == $username && $user[0]['password'] == $password){
        // authentication passed;
        // set user session
        $_SESSION['admin'] = $username;
        //redirect to admin panel
        header("location:index.php");
        
      }
      else{
        global $failure;
        $failure =  'incorrect username or password';
      }
    }
    else{
      echo "ERROR: Could not execute $userq. " . mysqli_error($conn);
    }
  }
  else{
    // if error in form submission
    $failure = 'Please provide required values';
    //header("location:login.php");
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../public/bootstrap.css">
  <link rel="stylesheet" href="../public/admin.css">
  <title>Styleblog Admin Panel</title>
</head>
<body>
  <div class='container' style='margin-top:10%;'>

    <?php if(isset($failure)): ?>
      <p class="text-center alert alert-danger col-sm-6 col-sm-offset-3"><?php echo $failure ?></p>
    <?php endif ?>
    <h3 class='col-sm-6 col-sm-offset-3'>Login</h3>
    <div class="col-sm-6 col-sm-offset-3">
      <hr>
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method='POST'>
        <div class="form-group">
          <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
        </div>
        <div class="form-group">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <div class="form-group">
          <input type="submit" name='login' value='login' class='btn btn-primary form-control'>
        </div>
        
      </form>
    </div>
  </div>
</body>
</html>