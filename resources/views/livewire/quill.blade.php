<div>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <div id="{{ $quillId }}" key="{{ $field }}" wire:ignore></div>

    {{-- {{ $field }} --}}

    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script>
        (function() {
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
                theme: 'snow'
            });
            quill.setText('{{ $initText }}')


            quill.on('text-change', function() {
                const value = document.querySelector('#{{ $quillId }} .ql-editor').innerHTML;
                @this.set('value', value)
            })
        })()
    </script>
</div>



{{-- <div>

    <div id="{{ $quillId }}" wire:ignore></div>

    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
                theme: 'snow'
            });

            // quill.insertText(0, '{{ $value }}');



            quill.on('text-change', function() {
                const value = document.querySelector('#{{ $quillId }} .ql-editor').innerHTML;
                @this.set('value', value)
            })

        })
    </script>
</div> --}}
