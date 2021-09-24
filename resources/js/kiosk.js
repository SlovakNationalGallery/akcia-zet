function disableExternalLinks() {
    const preventDefaultHandler = (event) => event.preventDefault()

    for (const link of document.getElementsByTagName('a')) {
        if (link.hostname === location.hostname) continue

        // Blend external links with other text
        link.className = ''
        link.classList.add('external')
        link.onclick = preventDefaultHandler
    }
}

// Moves to front page after inactivity
function initIdleTimer() {
    const fiveMinutes = 1000 * 60 * 5
    const redirectUrl = '/?kiosk'

    let idleTimeout

    const resetIdleTimer = function() {
        if (idleTimeout) clearTimeout(idleTimeout)

        idleTimeout = setTimeout(() => location.href = redirectUrl, fiveMinutes)
    }

    // Reset the idle timeout on any of the events listed below
    for (const event of ['click', 'touchstart', 'mousemove']) {
        document.addEventListener(event, resetIdleTimer, false)
    }

    // Start the timer
    resetIdleTimer()
}

export default {
    init() {
        disableExternalLinks()
        initIdleTimer()
    }
}
