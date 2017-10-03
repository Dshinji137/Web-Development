<?php require('core/init.php'); ?>

<?php

$topic = new Topic();

if(isset($_POST['do_create'])) {

  $validate = new Validate();

  $data = array();
  $data['title'] = $_POST['title'];
  $data['body'] = $_POST['body'];
  $data['category_id'] = $_POST['category'];
  $data['user_id'] = getUser()['user_id'];
  $data['last_activity'] = date('Y-m-d H:i:s');

  $filed_array = array('title','body','category');

  if($validate->isRequired($filed_array)) {
    if($topic->create($data)) {
      redirect('index.php','Your topic has been posted','success');
    }
    else {
      redirect('topic.php?id='.$topic_id,'Something went wrong with your topic','error');
    }
  }
  else {
    redirect('create.php','Please fill in all required fields','error');
  }
}

$template = new Template('templates/create.php');

echo $template;
?>
