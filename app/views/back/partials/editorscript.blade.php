<style>
    .tinymce-full,.tinymce-mini,.mce-tinymce{
        z-index: 1031;
    }
</style>
<script src="backend/plugins/jqueryform/jquery.form.min.js" type="text/javascript"></script>
<script src="backend/plugins/tinymce/tinymce.min.js" type="text/javascript"></script>
<script type="text/javascript">
    tinyMCE.init({
        // General
        directionality: "ltr",
        language: "en",
        mode: "specific_textareas",
        autosave_restore_when_empty: false,
        skin: "lightgray",
        theme: "modern",
        schema: "html5",
        selector: "textarea.mce_editor",
        // Cleanup/Output
        inline_styles: true,
        gecko_spellcheck: true,
        entity_encoding: "raw",
        valid_elements: "",
        extended_valid_elements: "hr[id|title|alt|class|width|size|noshade]",
        force_br_newlines: false, force_p_newlines: true, forced_root_block: 'p',
        toolbar_items_size: "small",
        invalid_elements: "script,applet,iframe",
        // Plugins
        plugins: "table link image code hr charmap autolink lists importcss",
        // Toolbar
        toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | formatselect | bullist numlist",
        toolbar2: "outdent indent | undo redo | link unlink anchor image code | hr table | subscript superscript | charmap",
        removed_menuitems: "newdocument",
        // URL
        relative_urls: true,
        remove_script_host: false,
        document_base_url: "https://j68h101.demojoomla.com/",
        // Layout
        content_css: "https://j68h101.demojoomla.com/templates/system/css/editor.css",
        importcss_append: true,
        // Advanced Options
        resize: "both",
        height: "550",
        width: "",
        file_browser_callback: RoxyFileBrowser
    });
    tinymce.init({
        selector: "textarea.tinymce-full",
        mode: 'textareas',
        schema: "html5",
//        plugins: [
//            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
//            "searchreplace wordcount visualblocks visualchars code fullscreen",
//            "insertdatetime media nonbreaking save table contextmenu directionality",
//            "emoticons template paste textcolor colorpicker textpattern autoresize"
//        ],
//        toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
//        toolbar2: "print preview media | forecolor backcolor emoticons",
// Plugins
        plugins: "table link image code hr charmap autolink lists importcss",
        // Toolbar
        toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | formatselect | bullist numlist outdent indent | undo redo | link unlink anchor image code | hr table | subscript superscript | charmap",
        removed_menuitems: "newdocument",
        image_advtab: true,
        autosave_ask_before_unload: false,
        resize: "both",
        height: "550",
        // URL
        relative_urls: true,
        remove_script_host: false,
        document_base_url: "{{URL::to('/')}}/",
        file_browser_callback: RoxyFileBrowser
    });
    tinymce.init({
        selector: "textarea.tinymce-mid",
        mode: 'textareas',
        schema: "html5",
//        plugins: [
//            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
//            "searchreplace wordcount visualblocks visualchars code fullscreen",
//            "insertdatetime media nonbreaking save table contextmenu directionality",
//            "emoticons template paste textcolor colorpicker textpattern autoresize"
//        ],
//        toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
//        toolbar2: "print preview media | forecolor backcolor emoticons",
// Plugins
        plugins: "table link image code hr charmap autolink lists importcss",
        // Toolbar
        toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | formatselect | bullist numlist outdent indent | undo redo | link unlink anchor image code | hr table | subscript superscript | charmap",
        removed_menuitems: "newdocument",
        image_advtab: true,
        autosave_ask_before_unload: false,
        resize: "both",
        height: "200",
        // URL
        relative_urls: true,
        remove_script_host: false,
        document_base_url: "{{URL::to('/')}}/",
        file_browser_callback: RoxyFileBrowser
    });
    function RoxyFileBrowser(field_name, url, type, win) {
        var roxyFileman = 'backend/plugins/fileman/index.html';
        if (roxyFileman.indexOf("?") < 0) {
            roxyFileman += "?type=" + type;
        }
        else {
            roxyFileman += "&type=" + type;
        }
        roxyFileman += '&input=' + field_name + '&value=' + win.document.getElementById(field_name).value;
        if (tinyMCE.activeEditor.settings.language) {
            roxyFileman += '&langCode=' + tinyMCE.activeEditor.settings.language;
        }
        tinyMCE.activeEditor.windowManager.open({
            file: roxyFileman,
            title: 'Roxy Fileman',
            width: 850,
            height: 650,
            resizable: "yes",
            plugins: "media",
            inline: "yes",
            close_previous: "no"
        }, {window: win, input: field_name});
        return false;
    }
    tinymce.init({
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern autoresize"
        ],
        mode: 'textareas',
        selector: "textarea.tinymce-mini",
        toolbar: "undo redo | bold italic",
        menubar: false,
        statusbar: false,
        autosave_ask_before_unload: false,
        max_height: 100,
        min_height: 80,
        height: 90,
        autoresize_max_height: 800,
    });
    tinymce.init({
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern autoresize"
        ],
        mode: 'textareas',
        selector: "textarea.tinymce-list-only",
        toolbar: "undo redo | bold italic | bullist numlist",
        menubar: false,
        statusbar: false,
        autosave_ask_before_unload: false,
        max_height: 100,
        min_height: 80,
        height: 90,
        autoresize_max_height: 800,
    });

    function setMidTinymce(selector) {
        tinyMCE.init({
            selector: selector,
            mode: 'textareas',
            schema: "html5",
            plugins: "table link image code hr charmap autolink lists importcss",
            // Toolbar
            toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | formatselect | bullist numlist outdent indent | undo redo | link unlink anchor image code | hr table | subscript superscript | charmap",
            removed_menuitems: "newdocument",
            image_advtab: true,
            autosave_ask_before_unload: false,
            resize: "both",
            height: "200",
            // URL
            relative_urls: true,
            remove_script_host: false,
            document_base_url: "{{URL::to('/')}}/",
            file_browser_callback: RoxyFileBrowser
        });
    }
    $(document).ready(function() {

    });
</script>