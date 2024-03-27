const dropdownButtons = document.querySelectorAll('.entry__item__button');

function openCloseDropdown (header, list, state) {
    if(state === "false") {
        header.setAttribute('data-dropped', "true");
        list.setAttribute('data-dropped', "true");
    } else if (state === "true") {
        header.setAttribute('data-dropped', "false");
        list.setAttribute('data-dropped', "false");
    }
}

dropdownButtons.forEach(btn => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        const header = e.target.parentNode;
        const list = e.target.parentNode.nextElementSibling;
        const state = header.getAttribute('data-dropped');
        openCloseDropdown(header, list, state);
    })
})
