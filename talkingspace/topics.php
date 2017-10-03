<?php require('core/init.php'); ?>

<?php

$topic = new Topic();
$user = new User();

$category = isset($_GET['category']) ? $_GET['category'] : null;
$user_id = isset($_GET['user']) ? $_GET['user'] : null;

$template = new Template('templates/topics.php');

// Assign template variables
if(isset($category)) {
  $template->topics = $topic->getByCategory($category);
  $template->title = "Post In ".$topic->getCategory($category)->name;
}

if(isset($user_id)) {
  $template->topics = $topic->getByUser($user_id);
  //$template->title = 'Post By ' .$user->getUser($user_id)->username;
}

if(!isset($user_id) && !isset($category)) {
  $template->topics = $topic->getAllTopics();
}

// Assign vars
$template->totalUsers = $user->getTotalUsers();
$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategories();

echo $template;
?>
