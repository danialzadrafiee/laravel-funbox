document.querySelectorAll('.house').forEach((el) => {
    let ell = el.getAttribute('l')
    let elt = el.getAttribute('t')
    el.style.left = ell + 'px';
    el.style.top = elt + 'px';
})


function resize() {
    const map = document.querySelector('map');
    let box = document.querySelector('.box');
    let zoomRatio = 1;
    box.style.width = window.innerWidth + 'px';
    box.style.height = window.innerHeight + 'px';


    if (window.innerWidth - 1920 > window.innerHeight - 1080) {
        zoomRatio = window.innerWidth / 1920;
    } else {
        zoomRatio = window.innerHeight / 1080;
    }
    if (zoomRatio > 1){
        map.style.zoom = zoomRatio;
    } else {
        map.style.zoom = 1;
    }
    console.log(zoomRatio);
}

resize();
// Add event listeners
window.addEventListener('resize', resize);
window.addEventListener('scroll', resize);
let lastZoomLevel;

function getZoomLevel() {
    return window.devicePixelRatio * 100;
}

function onWindowChange() {
    const currentZoomLevel = getZoomLevel();

    if (lastZoomLevel !== currentZoomLevel) {
        lastZoomLevel = currentZoomLevel;
        resize();
    }
}
resize();
window.addEventListener('resize', onWindowChange);
window.addEventListener('scroll', onWindowChange);
lastZoomLevel = getZoomLevel();