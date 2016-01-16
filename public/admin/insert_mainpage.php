<?php
require_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/private/config.php');

$database = new tjrightdirection\Database();
if (isset($_POST['mainpage_text'])) {
    $database->updateText('mainpage', 'body', $_POST['mainpage_text']);
}
