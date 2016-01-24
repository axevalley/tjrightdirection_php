<?php
require_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/private/config.php');
require_once($PRIVATE . 'html/header.php');
$database = new tjrightdirection\Database();

$images = $database->getAllImages();

echo "\t<div id=\"gallery\" class=\"gallery\">\n";
echo "<br />\n";
foreach ($images as $image) {
    $filepath = 'images/gallery/thumbs/' . $image['filename'];
    echo "\t\t<div class=\"gallery_image\">\n";
    echo "\t\t\t<a href=\"\"><img src=\"{$filepath}\" class=\"gallery_image\" /></a>\n";
    echo "\t\t</div>\n";
}
echo "\t</div>\n";

require_once($PRIVATE . 'html/footer.php');
