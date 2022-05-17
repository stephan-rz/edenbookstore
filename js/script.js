let click = document.querySelector('.category');
let list = document.querySelector('.c-list');
let x = 0;

click.addEventListener('click', () => {
    if (x === 0) {
        list.style.transform = 'scaleY(1)';
        list.style.opacity = 1;
        x = 1;
    } else {
        list.style.transform = 'scaleY(0)';
        x = 0;
    }

});