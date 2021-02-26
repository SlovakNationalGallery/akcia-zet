const Flickity = require('flickity-fade')
const noUiSlider = require('nouislider')

function initFlickity(element, initialIndex) {
    return new Flickity(element, {
        initialIndex,
        cellAlign: 'left',
        contain: true,
        prevNextButtons: false,
        pageDots: false,
        draggable: false,
        fade: true,
        lazyLoad: 2,
        on: {
            lazyLoad(event, cell) {
                const image = cell.querySelector('img')
                image.sizes = Math.ceil(cell.getBoundingClientRect().width / window.innerWidth * 100 ) + 'vw'
            },
        }
    })
}

function initSlider(target, dates, dispatch) {
    // Set limits for the slider (note these are not actually reachable)
    const range = {
        min: new Date("2020-12-01").getTime() / 1000,
        max: new Date("2021-06-30").getTime() / 1000
    }

    dates.forEach((date) => {
        range[`${(date - range.min) / (range.max - range.min) * 100}%`] = date
    });

    // Variables for reachable values
    const minDate = dates[0]
    const maxDate = dates[dates.length - 1]

    const slider = noUiSlider.create(target, {
        start: maxDate,
        snap: true,
        connect: 'lower',
        tooltips: [true],
        range,
        format: {
            from: (val) => val,
            to: (val) => {
                const date = new Date(val * 1000)
                return `${date.getMonth() + 1}/${date.getFullYear().toString().substring(2)}`
            }
        },
        cssClasses: {
            ...noUiSlider.cssClasses,
            target: noUiSlider.cssClasses.target + ' bg-gray-400 border-0 rounded-none shadow-none h-3',
            connect: noUiSlider.cssClasses.connect + ' bg-yellow-400',
            connects: noUiSlider.cssClasses.connects + ' rounded-none',
            handle: ' absolute w-12 -right-6 -top-5 focus:outline-none',
            active: '',
            tooltip: ' absolute transform left-1/2 -translate-x-1/2 font-mono text-yellow-200 mt-2 text-xl',
        }
    })

    slider.on('slide', (values, handle, unencoded) =>  {
        const value = unencoded[0]

        // Limit to values within range
        if (value < minDate) return slider.set(minDate)
        if (value > maxDate) return slider.set(maxDate)

        // Move to the corresponsing image
        dispatch('slider-change', value)
    })
}

export {
    initSlider,
    initFlickity,
}
