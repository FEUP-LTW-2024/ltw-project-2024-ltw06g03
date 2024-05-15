

document.addEventListener('DOMContentLoaded', function() {
    const cycle_left = document.querySelector('.arrow-left');
    const cycle_right = document.querySelector('.arrow-right');
    const categoriesList = document.querySelector('#main-page > ul');
    const categories = document.querySelectorAll('#main-page > ul li');
    let categoryWidth = 220;

    cycle_right.addEventListener('click', function() {
        this.disabled = true;
        updateCategories(categoryWidth);
        setTimeout(() => {
            categories.forEach(category =>{
                category.style.transition = 'transform 0s';
                category.style.transform = null;
            });
        }, 900);
        setTimeout(() => {
            categoriesList.prepend(categoriesList.lastElementChild);
            this.disabled = false;
        }, 901);
        categories.forEach(category =>{
            category.style.transition = 'transform 1s';
        });
    });

    cycle_left.addEventListener('click', function() {
        this.disabled = true;
        updateCategories(-categoryWidth);
        setTimeout(() => {
            categories.forEach(category =>{
                category.style.transition = 'transform 0s';
                category.style.transform = null;
            });
        }, 900);
        setTimeout(() => {
            categoriesList.append(categoriesList.firstElementChild);
            this.disabled = false;
        }, 901);
        categories.forEach(category =>{
            category.style.transition = 'transform 1s';            
        });
    });
    function updateCategories(offset) {
        categories.forEach((category, index) => {
            category.style.transform = `translateX(${offset}px)`;
        });
    }

    

});

document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.cart-icon').addEventListener('click', function() {
        document.querySelector('.cartTab').style.display = 'grid';
    });
});

