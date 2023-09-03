<div>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <div id="{{ $quillId }}" wire:ignore></div>

    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script>
        const quill = new Quill('#{{ $quillId }}', {
            styles: {
                '.ql-editor p': {
                    'font-family': "'Arial', san-serif",
                    'font-size': '12px',
                    'line-height': 1.5,
                    'color': '#0F2653'
                },
            },
            modules: {
                toolbar: [
                    [{
                        header: [1, 2, false]
                    }],
                    ['bold', 'italic', 'underline'],
                ]
            },
            placeholder: '',
        });
        quill.on('text-change', function() {
            const value = document.getElementsByClassName('ql-editor')[0].innerHTML;
            @this.set('value', value)
        })
    </script>
</div>
