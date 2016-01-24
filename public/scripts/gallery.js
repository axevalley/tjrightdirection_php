imageNumber = 0;
$(document).ready(function() {
    var overlay = $('<div id="overlay"><div id="overlay_left" class="overlay_pannel"></div><div id="overlay_center" class="overlay_pannel"></div><div id="overlay_right" class="overlay_pannel"><img src="/images/close.png" id="close_overlay" /></div></div>');
    overlay.appendTo(document.body);
    var wWidth = $(window).width();
    var wHeight = $(window).height();
    $('.overlay_pannel').css('height', '100%');
    if (wWidth < 501) {
        overlay.css('left', 0);
        overlay.css('width', '100%');
        $('#overlay_left').css('width', '10%');
        $('#overlay_right').css('width', '10%');
        $('#overlay_center').css('width', '70%');
    } else {
        var overlayWidth = wWidth * 0.2;
        overlay.css('left', overlayWidth);
        overlay.css('width', '60%');
        $('#overlay_center').css('width', '90%');
        $('#overlay_left').css('width', '5%');
        $('#overlay_right').css('width', '5%');
    }
    if (wHeight < 501) {
        overlay.css('top', 0);
        overlay.css('height', '100%');
    } else {
        var overlayHeight = wHeight * 0.1;
        overlay.css('top', overlayHeight);
        overlay.css('height', '80%');
    }

    overlay.attr('hidden', true);

    $('#overlay_right').click(function() {
        nextImage();
        setOverlayImage();
    });
    $('#overlay_left').click(function() {
        previousImage();
        setOverlayImage();
    });

    $('#close_overlay').click(function () {
        overlay.attr('hidden', true);
    });

    for (var i = 0; i < imageList.length; i++) {
        var filepath = thumbPath + imageList[i];
        $('#gallery').append('<div class="gallery_image"><img class="gallery_image" class="gallery_image" src="' + filepath + '" />');
        var image = $('#gallery img:last');
        image.click(imageClickGenerator(image));
    }


});

function imageClickGenerator(image) {
    return function() {
        var filepath = $(image).attr('src').split('/');
        var filename = filepath[filepath.length - 1];
        imageNumber = imageList.indexOf(filename);
        setOverlayImage();
        $('#overlay').attr('hidden', false);
    };
}

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
