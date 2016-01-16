<?php
require_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/private/config.php');
require_once($PRIVATE . 'html/admin/header.php');
$database = new tjrightdirection\Database();

$pageText = $database->getPageText('mainpage');
?>
<div>
    <form method="post" id="update_text_form">
        <table id="update_text_table">
            <tr>
                <td class="label"><label for="update_mainpage_text">Main Page Text</label></td>
                <td class="text_editor"><textarea name="edit_mainpage_body" id="edit_mainpage_body" cols="80" rows="3"><?php echo $pageText['body']; ?></textarea></td>
                <td class="save_button"><input value="Save" type="button" id="save_mainpage_body"></td>
            </tr>
            <tr>
                <td class="label"><lable for="">Text</lable></td>
                <td class="text_input"><input type="text"></td>
                <td class="save_button"><input value="Save" type="button"></td>
            </tr>
        </table>
    </form>
</div>
<script src="/scripts/admin_text_editor.js"></script>
<?php
require_once($PRIVATE . 'html/admin/footer.php');
