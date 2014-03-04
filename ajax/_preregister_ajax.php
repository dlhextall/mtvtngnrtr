<?php

require_once realpath(dirname(__FILE__) . '/../ressources/Config.php');
Config::initLocale();
require_once realpath(Config::getLibraryPath() . '/mailing/Mailing.php');

$email = $_GET['email'];
$error_msg = null;

try {
	Mailing::preRegister($email);
} catch (Exception $e) {
	$error_msg = $e->getMessage();
}

?>

<div id="return_value">
	<?php if ($error_msg !== null): ?>
		<?php print $error_msg; ?>
	<?php else: ?>
		Your email address has been saved.
	<?php endif; ?>
</div>