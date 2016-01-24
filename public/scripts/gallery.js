$(document).ready(function() {
    var overlay = $('<div id="overlay"></div>');
    var wWidth = $(window).width();
    var wHeight = $(window).height();
    overlay.css('background-image', 'url("/images/homeBG_faded.jpg")');
    overlay.css('left', wWidth * 0.2);
    overlay.css('top', wHeight * 0.1);
    overlay.css('width', '60%');
    overlay.css('height', '80%');
    overlay.appendTo(document.body);
    overlay.attr('hidden', true);
    overlay.click(function () {
        overlay.attr('hidden', true)
    });
});

$('img.gallery_image').each(function() {
    var filepath = $(this).attr('src').split('/');
    var filename = filepath[filepath.length - 1];
    $(this).click(function () {
        setOverlayImage(filename);
        $('#overlay').attr('hidden', false);
    });
});

function setOverlayImage(filename) {
    console.log(filename);
    var imageURL = "/images/gallery/images/" + filename;
    $('#overlay').css('background-image', 'url("' +  imageURL + '")');
}
