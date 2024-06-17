document.querySelector('.create-recurrence').addEventListener('click', ()=>{
    const overlay = document.querySelector('.overlay');
    const container = document.querySelector('.create-recurrencig-container');

    document.querySelector('.close-btn').addEventListener('click', ()=>{
        container.style.display='none';
        overlay.style.display='none';
    })

    overlay.style.display='flex';
    container.style.display='flex';
});