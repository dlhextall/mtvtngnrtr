function getRandomImage(_array) {
    var length = _array.length;
    var random = Math.floor(Math.random() * length);
    return _array[random];
}

function setBackgroundImage(_subreddit, _filternsfw, _event) {
    if (typeof _event !== "undefined") {
        $("#" + _event.target.id).siblings("img").show();
    }
    _subreddit = _subreddit || 'cinemagraphs+perfectloops';
    _filternsfw = (typeof _filternsfw === "undefined" || _filternsfw == null) ? 1 : parseInt(_filternsfw);
    var images = new Array();
    $.getJSON("http://my.reddit.com/r/" + _subreddit + "/.json?jsonp=?", function(data) {
        $.each(data.data.children, function(i,item){
            if (item.data.url.toLowerCase().match(/.*\.(jpg|gif|jpeg|png)/)) {
                if (_filternsfw == 1 && !item.data.over_18) {
                    images.push(item.data.url);
                } else if (_filternsfw == 0) {
                    images.push(item.data.url);
                }
            }
        });
        var imgsrc = getRandomImage(images);
        $("img.bg").attr('src', imgsrc).load(function() {
            if (typeof _event !== "undefined") {
                $("#" + _event.target.id).siblings("img").hide();
            }
        });
    });
}

function resetBackgroundImage(_event) {
    eraseCookie("subreddit");
    eraseCookie("filternsfw");
    setBackgroundImage(null, null, _event);
}

function updateNSFW(_event) {
    var filternsfw = parseInt(getCookie("filternsfw"));
    if (filternsfw == 0) {
        filternsfw = 1;
        $("#nsfwfilter_link").html("enable nsfw");
    } else {
        filternsfw = 0;
        $("#nsfwfilter_link").html("disable nsfw");
    }
    setBackgroundImage(getCookie("subreddit"), filternsfw, _event);
    setCookie("filternsfw", filternsfw);
}