<?php
require_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/private/config.php');
require_once($PRIVATE . 'html/admin/header.php');
$database = new tjrightdirection\Database();

$database = new tjrightdirection\Database();

$images = $database->getAllImages();
