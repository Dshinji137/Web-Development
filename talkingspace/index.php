<?php require('core/init.php'); ?>

<?php
// create topic object
$topic = new Topic();

$user = new User();

$template = new Template('templates/frontpage.php');

// Assign vars
$template->topics = $topic->getAllTopics();
$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategories();
$template->totalUsers = $user->getTotalUsers();

echo $template;
?>
