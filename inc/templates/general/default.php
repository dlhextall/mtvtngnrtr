<?php

require_once realpath(dirname(__FILE__) . '/../../Config.php');
Config::initLocale();

?>

<!DOCTYPE html>
<html>
      <head>
            <title><?php print $t_title; ?></title>

            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; minimum-scale=1.0; user-scalable=0;"/>
            <meta name="apple-mobile-web-app-capable" content="yes">
            <meta charset="utf-8"/>

            <link rel="stylesheet" type="text/css" href="css/style.php"/>

            <script type="text/javascript" src="js/jquery.js"></script>
            <?php
                  if (!empty($t_fScript) && $t_fScript != "") {
                        if (is_array($t_fScript)) {
                              foreach ($t_fScript as $file) {
                                    print "<script type='text/javascript' src='js/{$file}'></script>";
                              }
                        } else {
                              print "<script type='text/javascript' src='js/{$t_fScript}'></script>";
                        }
                  }
            ?>
            <script type="text/javascript">
                  <?php print $t_script; ?>
            </script>
      </head>
      <body>
            <header class="right">
                  <ul id="bg_chooser"><?php include realpath(Config::getTemplatePath() . "/general/_bg_chooser.php") ?></ul>
                  <ul id="lang_chooser"><?php include realpath(Config::getTemplatePath() . "/general/_lang_chooser.php"); ?></ul>
                  <h1><?php print $lang["generator_name"]; ?>*</h1>
                  <span class='legend'>*<?php print $lang["generator_legend"]; ?></span>
            </header>
            <section id="main">
                  <?php print $t_main; ?>
            </section>
            <section id="secondary">
                  <?php print $t_secondary; ?>
            </section>
            <section id="facebook_sharing">
                  <?php realpath(Config::getTemplatePath() . "/general/_facebook_sharing.php"); ?>
            </section>
            <footer>
                  <?php print $t_footer; ?>
                  <div>v<?php print VERSION_NO; ?> <?php print $lang["version_number_comment"]; ?></div>
            </footer>
            <?php include realpath(Config::getTemplatePath() . "/general/_custom_bg_chooser.php"); ?>
      </body>
</html>