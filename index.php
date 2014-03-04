<?php

require_once 'inc/autoload.php';

$message = new \library\content\Message();
// print_r($message->getMessageObj());

?>

<?php include 'inc/templates/general/header.php'; ?>

<div class="twitterpost">
    <span class="text"><?php echo $message->getText(true); ?></span>
    <div class="author">- <a href="<?php echo $message->getUsernameURL(); ?>" target="_blank"><?php echo $message->getUsername(); ?></a></div>
</div>

<?php include 'inc/templates/general/footer.php'; ?>