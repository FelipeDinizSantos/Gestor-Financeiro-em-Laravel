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

document.addEventListener('DOMContentLoaded', () => {

    function askNotificationPermission() {
        if (Notification.permission !== 'granted') {
            Notification.requestPermission().then(permission => {
                if (permission === 'granted') {
                    checkPaymentDate();
                }
            });
        } else {
            checkPaymentDate();
        }
    }

    function checkPaymentDate() {
        document.querySelectorAll('.pay-date').forEach(element => {
            const payDateString = element.innerText.trim();
            const payDateParts = payDateString.split('-');
            
            const payDate = new Date(`${payDateParts[2]}-${payDateParts[1]}-${payDateParts[0]}T00:00:00`);
    
            const today = new Date();
            today.setHours(0, 0, 0, 0);
    
            const tomorrow = new Date(today);
            tomorrow.setDate(today.getDate() + 1);
    
            const reminderTitle = element.parentElement.parentNode.querySelector('.reminderTitle').innerHTML;

            if (payDate.getTime() === today.getTime()) {
                sendNotification(`ATENÇÃO: ${reminderTitle}`, `O pagamento é hoje.`);
            } else if (payDate.getTime() === tomorrow.getTime()) {
                sendNotification(`ATENÇÃO:  ${reminderTitle}`, `O pagamento é amanhã.`);
            }
        });
    }

    function sendNotification(title, message) {
        if (Notification.permission === 'granted') {
            new Notification(title, {
                body: message,
            });
        }
    }

    askNotificationPermission();
});

