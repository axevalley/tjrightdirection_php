$('#update_text_table tr:has(textarea)').each(function() {
    addEditor($(this).find('textarea').attr('id'));
    $(this).find('input[type="button"]').click(editorSaveButtonGenerator());
});
$('#update_text_table tr:not(:has(textarea))').each(function() {
        console.log('input');
});

function addEditor(textareaId) {
    mainpageText = new nicEditor(
        {
            iconsPath: '/scripts/nicEdit/nicEditorIcons.gif',
            buttonList: ['bold', 'italic', 'underline', 'left', 'center', 'right', 'ol', 'ul', 'indent', 'outdent']
        }
    ).panelInstance(textareaId);
}

function editorSaveButtonGenerator() {
    return function() {
        var split = $(this).attr('id').split('_');
        var page = split[1];
        var name = split[2];
        var editorId = 'edit_' + page + '_' + name;
        console.log(editorId);
        var editor = new nicEditors.findEditor(editorId);
        var editor_html = editor.getContent();
        var data = new FormData();
        data.append('page', page);
        data.append('name', name);
        data.append('text', editor_html);
        $.ajax({
            url: 'insert_mainpage.php',
            data: data,
            type: 'POST',
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('.nicEdit-main').attr('contenteditable','false');
                $('.nicEdit-panel').hide();
            },
            success: function (data) {
                $('#' + editorId).html(data);
                $('.nicEdit-main').attr('contenteditable','true');
                $('.nicEdit-panel').show();
            }
        });
    };
}

$('#update_text_form').submit(function(e) {
    e.preventDefault();
    var mainpage_editor = new nicEditors.findEditor('update_mainpage_text');
    var mainpage_html = mainpage_editor.getContent();
    console.log(mainpage_html);
    var data = new FormData();
    data.append('page', 'mainpage');
    data.append('name', 'body');
    data.append('text', mainpage_html);
    $.ajax({
        url: 'insert_mainpage.php',
        data: data,
        type: 'POST',
        contentType: false,
        processData: false,
        beforeSend: function() {
            $('.nicEdit-main').attr('contenteditable','false');
            $('.nicEdit-panel').hide();
        },
        success: function (data) {
            console.log(data);
            $('#update_mainpage_text').html(data);
            $('.nicEdit-main').attr('contenteditable','true');
            $('.nicEdit-panel').show();
        }
    });
});
