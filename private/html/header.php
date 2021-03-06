<?php
require_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/private/config.php');
require_once($PRIVATE . 'html/header.php');
$database = new tjrightdirection\Database();
$phoneNumbers = $database->getPhoneNumbers();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Right Direction</title>
    <link rel="stylesheet" href="css/tjrightdirection.css">
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
</head>
<body>
    <div id="container">
        <div id="header">
            <div id="sitename_phone">
                <div class="sitename">
                    <h1>Right Direction</h1>
                    <h3>Building &amp; Landscape Specialists</h3>
                </div>
                <div class="contact_numbers">
                    <ul class="phone">
                        <?php
                        echo "\n";
                        foreach ($phoneNumbers as $number) {
                            echo "\t\t\t\t\t<li class=\"phone\">{$number['name']}: <a class=\"phone\" href=\"tel:{$number['number']}\">{$number['number']}</a></li>\n";
                        }
                        ?>
                    </ul>
                </div>
            </div>
<?php include('nav.php'); ?>
        </div>
        <div id="body">
