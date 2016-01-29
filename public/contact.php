<?php
require_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/private/config.php');
require_once($PRIVATE . 'html/header.php');
$database = new tjrightdirection\Database();
?>
<p class="page_header">To get in touch please call us on the number above, email us at <a href="mailto:info@tjrightdirection.co.uk">info@tjrightdirection.co.uk</a> or use the contact form below</p>
<div id="contact_form">
    <label for="email">eMail Address</lable>
    <input type="email" name="email" class="contact_input" id="contact_email" />
    <label for="phone">Phone Number</lable>
    <input type="text" name="phone" class="contact_input" id="contact_phone" />
    <label for="message">Message</lable>
    <textarea name="message" class="contact_input" id="contact_message" rows="30" cols="70"></textarea>
    <br />
    <input type="submit" id="contact_submit" class="contact_input" value="Submit" />
</div>
<?php
require_once($PRIVATE . 'html/footer.php');
