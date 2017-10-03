<?php require('core/init.php'); ?>

<?php
  $topic = new Topic();

  $user = new User();

  $validate = new Validate();

  if(isset($_POST['register'])) {
    $data = array();
    $data['name'] = $_POST['name'];
    $data['email'] = $_POST['email'];
    $data['username'] = $_POST['username'];
    $data['password'] = md5($_POST['password']);
    $data['password2'] = md5($_POST['password2']);
    $data['about'] = $_POST['about'];
    $data['last_activity'] = date("Y-m-d M:i:s");

    $field_array = array('name','email','username','password','password2');
    if($validate->isRequired($field_array)) {
      if($validate->isValidEmail($data['email'])) {
        if($validate->passwordMatch($data['password'],$data['password2'])) {
          //redirect('index.php','You are registered and now can log in','success');
          //upload Avatar image
          if($user->uploadAvatar()) {
            $data['avatar'] = $_FILES['avatar']['name'];
          }
          else {
            $data['avatar'] = "noimage.png";
          }
          // Register User
          if($user->register($data)) {
            redirect('index.php','You are registered and now can log in','success');
          }
          else {
            redirect('index.php','Something went wrong with your registration','error');
          }
        }
        else {
          redirect('register.php','Your password does not match','error');
        }
      }
      else {
        redirect('register.php','Please use a valid email address','error');
      }
    }
    else {
      redirect('register.php','Please fill in all required fields','error');
    }
  }
?>

<?php
$template = new Template('templates/register.php');

echo $template;
?>
