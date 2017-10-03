<?php require('core/init.php'); ?>

<?php
  if(isset($_POST['do_login'])) {
    // Get Vars
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    // Create user
    $user = new User();
    if($user->login($username,$password)) {
      redirect('index.php','You have been logged in','success');
    }
    else {
      redirect('index.php','Log in is not valid','error');
    }
  }
  else {
    redirect('index.php');
  }
?>
