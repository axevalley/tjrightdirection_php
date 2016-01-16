<?php
require_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/private/config.php');
require_once($PRIVATE . 'html/header.php');
$database = new tjrightdirection\Database();
$pageText = $database->getPageText('mainpage');

echo $pageText['body'];
require_once($PRIVATE . 'html/footer.php');
