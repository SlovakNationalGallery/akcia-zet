window.Trix = require('trix');

addEventListener("trix-initialize", function(event) {
    const toolbar = event.target.toolbarElement

    // Hide default 'attach icon'
    toolbar.querySelector('.trix-button--icon-attach').style.display = 'none'

    // Add 'embed' button & dialog
    const embedButtonHtml = '<button type="button" class="trix-button" data-trix-attribute="embed">EMBED</button>'
    toolbar.querySelector(".trix-button-group--file-tools")
        .insertAdjacentHTML("beforeend", embedButtonHtml)

    const embedDialogHtml = `
    <div class="trix-dialog" data-trix-dialog="embed">
        <input type="text" class="trix-input trix-input--dialog" placeholder="<embed... alebo <iframe..." data-trix-input-x-embed>
        <div class="trix-button-group">
            <input type="button" class="trix-button trix-button--dialog" value="Vložiť" data-trix-action="x-embed">
        </div>
    </div>
    `
    toolbar.querySelector(".trix-dialogs")
        .insertAdjacentHTML("beforeend", embedDialogHtml)
})
