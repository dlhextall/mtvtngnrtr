<?php foreach (library\content\Messages::getMessageLanguages() as $msg_lang): ?>
	<li><a href="<?php print $_SERVER['PHP_SELF'] ?>?lang=<?php print $msg_lang; ?>"><?php print $msg_lang; ?></a></li>
<?php endforeach; ?>