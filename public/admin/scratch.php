<?php
require_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/private/config.php');
require_once($PRIVATE . 'html/admin/header.php');
$database = new tjrightdirection\Database();

$query = "SELECT gallery_images.id FROM gallery_images INNER JOIN gallery_jobs ON gallery_images.gallery_jobs_id=gallery_jobs.id WHERE gallery_jobs.id = 0 ORDER BY gallery_images.sort_order;";

$result = $database->getNextJobNumber();

print_r($result);
