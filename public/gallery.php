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
</div>
<script>
    thumbPath = "/images/gallery/thumbs/";
    fullPath = "/images/gallery/images/";
    imageList = <?php echo json_encode($imageFilenames); ?>;
</script>
<script src="/scripts/gallery.js"></script>

<?php
require_once($PRIVATE . 'html/footer.php');
