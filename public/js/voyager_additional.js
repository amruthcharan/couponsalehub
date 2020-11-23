function tinymce_init_callback(editor)
{
    editor.settings.plugins = 'link';
    editor.settings.rel_list =
        [
            {title: 'No Follow', value: 'nofollow'},
            {title: 'Do Follow', value: ''}
        ];
}
