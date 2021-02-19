require('./bootstrap');
require('alpinejs');

window.Flickity = require('flickity-fade')
window.noUiSlider = require('nouislider')

// Makes "cut-outs" in background of parentElement in the shape of elements
// found by cutoutsSelector. Used for divider "slits"
function calculateCutoutPolygon(parentElement, cutoutsSelector){
    const polygonPoints = ['0% 0%', '0% 100%']
    let parentRect = parentElement.getBoundingClientRect()
    let cutouts = parentElement.querySelectorAll(cutoutsSelector)

    for (let i = 0; i < cutouts.length; ++i) {
        const cutoutRect = cutouts[i].getBoundingClientRect()

        const rect = {
            left: (cutoutRect.left - parentRect.left)/parentRect.width * 100 + "%",
            right: cutoutRect.right/parentRect.width * 100 + "%",
            top: (cutoutRect.top - parentRect.top)/parentRect.height * 100 + "%",
            bottom: (cutoutRect.bottom - parentRect.top)/parentRect.height * 100 + "%",
        }

        polygonPoints.push(
            `${rect.left} 100%`,
            `${rect.left} ${rect.top}`,
            `${rect.right} ${rect.top}`,
            `${rect.right} ${rect.bottom}`,
            `${rect.left} ${rect.bottom}`,
            `${rect.left} 100%`
        )
    }
    polygonPoints.push('100% 100%', '100% 0%')
    return {polygonPoints}
}

window.calculateCutoutPolygon = calculateCutoutPolygon
