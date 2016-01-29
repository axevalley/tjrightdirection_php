<?php
require_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/private/config.php');
require_once($PRIVATE . 'html/header.php');
$database = new tjrightdirection\Database();
$recomendations = $database->getRecomendations();
?>

<div id="testimonial_header">
    <p>Contact details for referees available upon request.</p>
</div>

<?php

foreach ($recomendations as $rec) {
    echo "<div class=\"rec_quote\">\n";
    echo nl2br(htmlspecialchars($rec['quote']));
    echo "\n<p class=\"rec_name\">&mdash;&nbsp;{$rec['name']}</p>\n";
    echo "\n<p class=\"rec_name\">{$rec['address']}</p>\n";
    echo "</div>\n";
}

require_once($PRIVATE . 'html/footer.php');
