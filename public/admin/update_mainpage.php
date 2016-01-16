<?php
require_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/private/config.php');
require_once($PRIVATE . 'html/admin/header.php');
$database = new tjrightdirection\Database();

$pageText = $database->getPageText('mainpage');
?>
<div>
    <form method="post" id="update_text_form" action="" id="update_text">
        <table id="update_text_table">
            <tr>
                <td><label for="update_mainpage_text">Main Page Text</label></td>
                <td class="text_editor"><textarea name="update_mainpage_text" id="update_mainpage_text" cols="80" rows="3"><?php echo $pageText['body']; ?></textarea></td>
            </tr>
            <tr>
                <td><input value="Save" type="submit"></td>
            </tr>
        </table>
    </form>
</div>
<script>
    mainpageText = new nicEditor(
        {
            iconsPath: '/scripts/nicEdit/nicEditorIcons.gif',
            buttonList: ['bold', 'italic', 'underline', 'left', 'center', 'right', 'ol', 'ul', 'indent', 'outdent']
        }
    ).panelInstance('update_mainpage_text');

    $('#update_text_form').submit(function(e) {
        e.preventDefault();
        var mainpage_editor = new nicEditors.findEditor('update_mainpage_text');
        var mainpage_html = mainpage_editor.getContent();
        console.log(mainpage_html);
        var data = new FormData();
        data.append('mainpage_text', mainpage_html);
        $.ajax({
            url: 'insert_mainpage.php',
            data: data,
            type: 'POST',
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data);
            }
        });
    });

</script>
<?php
require_once($PRIVATE . 'html/admin/footer.php');
