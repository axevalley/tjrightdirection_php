<?php
require_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/private/config.php');
require_once($PRIVATE . 'html/header.php');
$database = new tjrightdirection\Database();
$pageText = $database->getPageText('mainpage');
?>
<div id="mainpage_backgound">
    <div id="mainpage_text">
        <?php echo $pageText['body']; ?>
    </div>
</div>
<?php
require_once($PRIVATE . 'html/footer.php');
