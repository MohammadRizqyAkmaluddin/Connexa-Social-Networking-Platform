ClassicEditor
    .create(document.querySelector('#editor'), {
        toolbar: [
            'heading',
            '|',
            'bold', 'italic', 'underline',
            '|',
            'bulletedList', 'numberedList',
            '|',
            'alignment',      // ⬅⬅⬅ ini yang penting
            '|',
            'blockQuote',
            '|',
            'undo', 'redo'
        ],
        alignment: {
            options: [ 'left', 'center', 'right', 'justify' ]
        }
    })
    .catch(error => console.error(error));

window.editors = window.editors || {};

    document.querySelectorAll('textarea[id^="editor-"]').forEach(textarea => {
        ClassicEditor
            .create(textarea, {
                toolbar: [
                    'heading', '|',
                    'bold','italic','underline', '|',
                    'bulletedList','numberedList', '|',
                    'alignment', '|',
                    'blockQuote', '|',
                    'undo','redo'
                ],
                alignment: { options: ['left','center','right','justify'] }
            })
            .then(editor => {
                // simpan instance dengan key = id textarea
                window.editors[textarea.id] = editor;
            })
            .catch(error => console.error(error));
    });

