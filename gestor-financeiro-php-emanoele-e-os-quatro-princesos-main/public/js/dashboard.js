document.querySelector('.update-account-balance').addEventListener('click', ()=>{
    const overlay = document.querySelector('.overlay');
    const container = document.querySelector('.update-balance-container');

    document.querySelector('.close-btn').addEventListener('click', ()=>{
        container.style.display='none';
        overlay.style.display='none';
    })

    overlay.style.display='flex';
    container.style.display='flex';
});