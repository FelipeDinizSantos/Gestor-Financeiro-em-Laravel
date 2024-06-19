document.querySelector('.update-account-balance').addEventListener('click', ()=>{
    const overlay = document.querySelector('.overlay');
    const updateBalanceContainer = document.querySelector('.update-balance-container');
   
    updateBalanceContainer.querySelector('.close-btn').addEventListener('click', ()=>{
        updateBalanceContainer.style.display='none';
        overlay.style.display='none';
    });

    overlay.style.display='flex';
    updateBalanceContainer.style.display='flex';
});

document.querySelector('.create-transactions').addEventListener('click', ()=>{
    const overlay = document.querySelector('.overlay');
    const createTransactionContainer = document.querySelector('.create-transaction-container');

    createTransactionContainer.querySelector('.close-btn').addEventListener('click', ()=>{
        createTransactionContainer.style.display='none';
        overlay.style.display='none';
    });

    overlay.style.display='flex';
    createTransactionContainer.style.display='flex';
});

document.querySelector('.create-reminder').addEventListener('click', ()=>{
    const overlay = document.querySelector('.overlay');
    const createRemainderContainer = document.querySelector('.create-reminder-container');

    createRemainderContainer.querySelector('.close-btn').addEventListener('click', ()=>{
        createRemainderContainer.style.display='none';
        overlay.style.display='none';
    });

    overlay.style.display='flex';
    createRemainderContainer.style.display='flex';
});
