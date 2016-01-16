<?php
require_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/private/config.php');
require_once($PRIVATE . 'html/admin/header.php');
?>
<div>
    <form action="" id="update_text">
        <table id="update_text_table">
            <tr>
                <td><label for="update_mainpage_text">Main Page Text</label></td>
                <td><textarea name="update_mainpage_text" id="update_mainpage_text" cols="80" rows="80"></textarea></td>
            </tr>
            <tr>
                <td><input type="submit"></td>
            </tr>
        </table>
    </form>
</div>
<?php
require_once($PRIVATE . 'html/admin/footer.php');
