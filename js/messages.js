function refreshMessages(_elem, _delay) {
    var anim_delay = 200;
    var interv = setInterval(function() {
        $(_elem).animate(
            { opacity: 0},
            anim_delay,
            function() {
            $.ajax({
                type: "GET",
                url: "ajax/_new_message.php",
                success: function(_data) {
                    $(_elem).html(_data).animate({opacity: 1}, anim_delay);
                },
                error: function(XMLHttpRequest, _textStatus, _errorThrown) {
                    $(_elem).html("Erreur").animate({opacity: 1}, anim_delay);
                    console.log(XMLHttpRequest.status + ":" + XMLHttpRequest.responseText);
                }
            });
        });
    }, _delay);
}

function stopMessages() {
    clearInterval(interv);
}