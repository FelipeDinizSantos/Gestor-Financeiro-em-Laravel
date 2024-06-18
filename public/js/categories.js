document.querySelector('.create-category').addEventListener('click', ()=>{
    const overlay = document.querySelector('.overlay');
    const createCategoryContainer = document.querySelector('.create-category-container');

    createCategoryContainer.querySelector('.close-btn').addEventListener('click', ()=>{
        createCategoryContainer.style.display='none';
        overlay.style.display='none';
    });

    overlay.style.display='flex';
    createCategoryContainer.style.display='flex';
});