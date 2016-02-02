<?php
require_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/private/config.php');
require_once($PRIVATE . 'html/header.php');
$database = new tjrightdirection\Database();

$images = $database->getAllImages();

$imageFilnames = array();
foreach ($images as $image) {
    $imageFilenames[] = $image['filename'];
}
?>

<div id="gallery" class="gallery">
    <br />
    <?php
    foreach ($images as $image) {
        $width = $image['thumb_width'];
        $height = $image['thumb_height'];
        $style = "style=\"width:{$width}px;height:{$height}px;\"";
        echo "<div class=\"gallery_image\" {$style}>";
        //echo "<img class=\"gallery_image\" src=\"images/loading.gif\" height=\"20\" />";
        echo "</div>";
    }
     ?>
</div>
<script>
    thumbPath = "/images/gallery/thumbs/";
    fullPath = "/images/gallery/images/";
    imageList = <?php echo json_encode($imageFilenames); ?>;
</script>
<script src="/scripts/gallery.js"></script>

<?php
require_once($PRIVATE . 'html/footer.php');
