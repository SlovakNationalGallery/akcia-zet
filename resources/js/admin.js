require('./bootstrap');

require('alpinejs');
require('./trix');
const Quill = require('quill');

function initQuill(ref, dispatch) {
    const toolbar = [
        ['bold', 'italic'],        // toggled buttons
        ['blockquote'],
        [{ 'header': 1 }],               // custom button values
        ['clean'],                       // remove formatting button
        ['link']
    ]

    const quill = new Quill(ref, {theme: 'snow', modules: { toolbar }, bounds: ref });
    quill.on('text-change', function () {
        dispatch('text-change', { content: quill.root.innerHTML })
    });
}

window.initQuill = initQuill
