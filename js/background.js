$(function() {
    refreshMessages('div#message', '" . $curr_lang . "', '" . $curr_filter . "', 5 * 1000);
    function getRandomImage(_array) {
        var length = _array.length;
        var random = Math.floor(Math.random() * length);
        return _array[random];
    }

    var images = new Array();
    $.getJSON("http://www.reddit.com/r/cinemagraphs/.json?jsonp=?", function(data) { 
        $.each(data.data.children, function(i,item){
            if (item.data.url.toLowerCase().match(/.*\.(jpg|gif|jpeg|png)/)) {
                images.push(item.data.url);
            }
        });
        $("html").css("background", "url('" + getRandomImage(images) + "') no-repeat center center fixed");
    });
});