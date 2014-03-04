<?php

require_once '../inc/autoload.php';
$message = new \library\content\Message();

?>

<div class="text"><?php echo $message->getText(true); ?></div>
<div class="author">- <a href="<?php echo $message->getUsernameURL(); ?>" target="_blank"><?php echo $message->getUsername(); ?></a></div>