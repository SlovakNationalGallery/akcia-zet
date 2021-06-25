const Flickity = require('flickity-fade')
const noUiSlider = require('nouislider')

const monthNames = ["JAN", "FEB", "MAR", "APR", "MÁJ", "JÚN", "JÚL", "AUG", "SEP", "OKT", "NOV", "DEC"]

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

function initSlider(target, dates, cssClasses, dispatch) {
    // Set limits for the slider (note these are not actually reachable)
    const range = {
        min: new Date("2020-10-15").getTime() / 1000,
        max: new Date("2021-08-15").getTime() / 1000
    }

    dates.forEach((date) => {
        range[`${(date - range.min) / (range.max - range.min) * 100}%`] = date
    });

    // Only show pips for existing values
    function filterPips(value, type) {
        if (value === range.min || value === range.max || type !== 1) return -1
        return type
    }

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
                return `${date.getDate()} ${monthNames[date.getMonth()]} ${date.getFullYear().toString().substring(2)}`
            }
        },
        pips: {
            mode: 'range',
            filter: filterPips,
        },
        cssClasses: {
            ...noUiSlider.cssClasses,
            ...cssClasses,
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
