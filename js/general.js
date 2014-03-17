$(document).ready(function() {
    currentBG = "";
    var subreddit = getCookie("subreddit");
    setBackgroundImage(subreddit, getCookie("filternsfw"));
    refreshMessages("div.twitterpost", 5000);
    $("#new_bg_link").click(function(event) {
        setBackgroundImage(getCookie('subreddit'), getCookie("filternsfw"), event);
    });
    $("#reset_bg_link").click(function(event) {
        resetBackgroundImage(event);
    });
    $("#nsfwfilter_link").click(function(event) {
        updateNSFW(event);
    });
    $("#custom_bg_link").click(function() {
        $("#custom_bg_chooser").slideToggle();
    });
    $("#custom_bg_chooser form").submit(function (_event) {
        _event.preventDefault();
        subreddit = $(this).children("input[type='text']").val();
        setBackgroundImage(subreddit);
        setCookie("subreddit", subreddit);
    });
});