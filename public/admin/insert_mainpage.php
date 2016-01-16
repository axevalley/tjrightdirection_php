<?php
require_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/private/config.php');

$database = new tjrightdirection\Database();
if (isset($_POST['text'])) {
    $database->updateText($_POST['page'], $_POST['name'], $_POST['text']);
}

echo $database->getText($_POST['page'], $_POST['name']);
