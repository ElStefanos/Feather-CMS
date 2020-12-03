function Clicked(clicked_id) {

    var clicked_id = '#'+clicked_id;
    var parent_id = clicked_id.replace('nav', 'item');

    $('[id^="nav"].active').toggleClass('active');
    $('[id^="item"].active').toggleClass('active');
    $(clicked_id).toggleClass('active');
    $(parent_id).toggleClass('active');
}


function RequestPageSettings(request) {
    $(".settings-pages").load('./extensions/settings_ext/'+request);
}