const OpenSeadragon = require('openseadragon')

function pickRandom(array) {
    return array[Math.floor(Math.random() * array.length)]
}

const tileSource = new OpenSeadragon.DziTileSource(
    12250, 13337, 256, 0,
    'https://img.webumenia.sk/zoom/?path=%2FVystavy%2Fakciazet%2Fjp2%2Fakciazet.jp2_files/',
    'jpg',
)

const destinations = [
    // Laser
    new OpenSeadragon.Point(0.8076468355747288, 0.8559183262179595),
    // Basket and laser
    new OpenSeadragon.Point(0.842960994906955, 0.8255290402730286),
    // Basket
    new OpenSeadragon.Point(0.8328838529685686, 0.727800779243577),
    // Kid
    new OpenSeadragon.Point(0.9004653202226491, 0.6406824684652968),
    // Flowers, steps
    new OpenSeadragon.Point(0.3631640732536106, 0.8829698372826646),
    // Vase
    new OpenSeadragon.Point(0.15148269401970513, 0.9554515575399319),
    // Elderly
    new OpenSeadragon.Point(0.13, 0.6637986366888344),
]

function initOpenSeaDragon(id) {
    const viewer = OpenSeadragon({
        id, // Note: element option did not work
        showNavigationControl: false,
        mouseNavEnabled: false,
        defaultZoomLevel: 5,
        minPixelRatio: 1,
        tileSources: tileSource,
        immediateRender: true,
    })

    viewer.addHandler('open', function () {
        viewer.viewport.panTo(pickRandom(destinations), true);
    })
    viewer.addHandler('pan', function () {
        // Utility for setting destinations
        // console.log(viewer.viewport.getCenter());
    })
}


export {
    initOpenSeaDragon
}
