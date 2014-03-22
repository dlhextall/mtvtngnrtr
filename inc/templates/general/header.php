<?php if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)): ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php else: ?>
    <!DOCTYPE html>
<?php endif; ?>
<html>
    <head>
        <title>GAM</title>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0"/>
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta charset="utf-8"/>

        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <link rel="stylesheet" type="text/css" href="css/mobile.css"/>

        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/general.js"></script>
        <script type="text/javascript" src="js/cookie.js"></script>
        <script type="text/javascript" src="js/bg.js"></script>
        <script type="text/javascript" src="js/messages.js"></script>
    </head>
    <body>
        <div id="general">
            <header class="right">
                <ul id="bg_chooser"><?php include 'inc/templates/general/_bg_chooser.php'; ?></ul>
                <?php include 'inc/templates/general/_custom_bg_chooser.php'; ?>
                <h1>MTVTN</h1>
                <span class='legend'>Random Motivation Generator</span>
            </header>
            <div id="contenu">
                <img src="" alt="" class="bg" />