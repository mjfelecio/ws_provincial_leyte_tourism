// EVENT LISTENERS
(function initEventListeners() {
    changeImagePreview();
})();

function toggleVisibility(elId) {
    const el = document.querySelector(elId);
    el.classList.toggle("visible");
}

// EVENT LISTENRES
function changeImagePreview() {
    image.onchange = (e) => {
        imagePreview.src = URL.createObjectURL(e.target.files[0]);
    }
}