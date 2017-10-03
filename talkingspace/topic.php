<?php require('core/init.php'); ?>

<?php

$topic = new Topic();

$topic_id = $_GET['id'];

if(isset($_POST['do_reply'])) {
  $data = array();
  $data['topic_id'] = $_GET['id'];
  $data['reply'] = $_POST['reply'];
  $data['user_id'] = getUser()['user_id'];

  $validate = new Validate();
  $field_array = array('reply');
  if($validate->isRequired($field_array)) {
    if($topic->reply($data)) {
      redirect('topic.php?id='.$topic_id,'Your reply has been posted','success');
    }
    else {
      redirect('topic.php?id='.$topic_id,'Something went wrong with your reply','error');
    }
  }
  else {
    redirect('topic.php?id='.$topic_id,'Please fill in your reply','error');
  }
}

$template = new Template('templates/topic.php');

$template->topic = $topic->getTopic($topic_id);
$template->replies = $topic->getReplies($topic_id);
$template->title = $topic->getTopic($topic_id)->title;

echo $template;
?>
