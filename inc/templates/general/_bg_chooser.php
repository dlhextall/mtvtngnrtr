<li><a href="javascript:setBackgroundImage(getCookie('subreddit'));">new</a></li>
<li><a id="custom_bg_link" href="#">custom</a></li>
<li><a id="nsfwfilter" href="javascript:updateNSFW();"><?php echo ($_COOKIE['filternsfw'] == 0) ? "disable nsfw" : "enable nsfw"; ?></a></li>
<li><a href="javascript:resetBackgroundImage();">reset</a></li>