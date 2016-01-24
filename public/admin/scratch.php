<?php
require_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/private/config.php');
require_once($PRIVATE . 'html/admin/header.php');
$database = new tjrightdirection\Database();

$database = new tjrightdirection\Database();

$images = $database->getAllImages();

$jobs = array();

foreach ($images as $image) {
    if (!(array_key_exists($image['job_name'], $jobs))) {
        $jobs[$image['job_name']] = array();
    }
    $jobs[$image['job_name']][] = array('filename'=>$image['filename'], 'id'=>$image['id']);
}

foreach ($jobs as $job => $jobImages) {
    $imageNumber = 1;
    foreach ($jobImages as $image => $imageDetails) {
        echo "<div style=\"border: solid black 1px; display: inline-block; width:100px; margin: 5px;\">";
        echo "<p>{$job}</p>";
        echo "<p>Image Number: {$imageNumber}</p>";
        echo "<img src=\"/images/gallery/thumbs/{$imageDetails['filename']}\" width=\"80\"/>";
        echo "<p>ID: {$imageDetails['id']}</p>";
        echo "</div>";
        $imageNumber ++;
    }
}
