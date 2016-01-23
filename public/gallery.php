<?php
require_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/private/config.php');
require_once($PRIVATE . 'html/header.php');
$database = new tjrightdirection\Database();

$images = $database->getAllImages();
echo "<div id=\"gallery\" class=\"gallery\">\n";
foreach ($images as $image) {
    $filepath = 'images/gallery/thumbs/' . $image['filename'];
    echo "<img src=\"{$filepath}\" />\n";
}
echo "</div>\n";

require_once($PRIVATE . 'html/footer.php');
