

document.addEventListener('DOMContentLoaded', function() {
    const cycle_left = document.querySelector('.arrow-left');
    const cycle_right = document.querySelector('.arrow-right');
    const categoriesList = document.querySelector('#main-page > ul');
    const categories = document.querySelectorAll('#main-page > ul li');
    let categoryWidth = 0;

    cycle_right.addEventListener('click', function() {
        categoryWidth += 220;
        updateCategories(categoryWidth);
        // categories.forEach(category =>{
        //     category.style.transform = null;
        // });
        categoriesList.prepend(categoriesList.lastElementChild);
    });

    cycle_left.addEventListener('click', function() {
        categoryWidth -= 220;
        updateCategories(categoryWidth);
        // categories.forEach(category =>{
        //     category.style.transform = null;
        // });
        categoriesList.appendChild(categoriesList.firstElementChild);
    });
    function updateCategories(offset) {
        categories.forEach((category, index) => {
            category.style.transform = `translateX(${offset}px)`;
        });
    }
});

