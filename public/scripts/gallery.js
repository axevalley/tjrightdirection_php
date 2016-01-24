imageNumber = 0;

$(document).ready(function() {
    for (var i = 0; i < imageList.length; i++) {
        var filepath = thumbPath + imageList[i];
        $('#gallery').append('<div class="gallery_image"><img class="gallery_image" class="gallery_image" src="' + filepath + '" />');
    }

    var overlay = $('<div id="overlay"><div id="overlay_left" class="overlay_pannel"></div><div id="overlay_center" class="overlay_pannel"></div><div id="overlay_right" class="overlay_pannel"><img src="/images/close.png" id="close_overlay" /></div></div>');
    var wWidth = $(window).width();
    var wHeight = $(window).height();
    var overlayWidth = wWidth * 0.2;
    var overlayHeight = wHeight * 0.1;
    overlay.css('left', overlayWidth);
    overlay.css('top', overlayHeight);
    overlay.css('width', '60%');
    overlay.css('height', '80%');
    overlay.appendTo(document.body);
    $('.overlay_pannel').css('height', '100%');
    $('#overlay_center').css('width', '90%');
    $('#overlay_left').css('width', '5%');
    $('#overlay_right').css('width', '5%');
    $('#overlay_right').click(function() {
        nextImage();
        setOverlayImage();
    });
    $('#overlay_left').click(function() {
        previousImage();
        setOverlayImage();
    });
    overlay.attr('hidden', true);

    $('#close_overlay').click(function () {
        overlay.attr('hidden', true);
    });

    $('img.gallery_image').each(function() {
        var filepath = $(this).attr('src').split('/');
        var filename = filepath[filepath.length - 1];
        $(this).click(function () {
            imageNumber = imageList.indexOf(filename);
            setOverlayImage();
            $('#overlay').attr('hidden', false);
        });
    });


});

function nextImage() {
    imageNumber ++;
    if (imageNumber > imageList.length) {
        imageNumber = 0;
    }
}

function previousImage() {
    imageNumber ++;
    if (imageNumber < 0) {
        imageNumber = imageList.length -1;
    }
}

function setOverlayImage() {
    var filename = imageList[imageNumber];
    var url = "/images/gallery/images/" + filename;
    $('#overlay_center').css('background-image', 'url("' +  url + '")');

}
