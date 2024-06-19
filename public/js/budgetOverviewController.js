const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
const categoryForm = document.querySelector('.category-form');
const financeOverviewBody = document.querySelector('.finance-overview-body');
const monthForm = document.querySelector('.month-form');

monthForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    const month = monthForm.querySelector('#month').value;
    const categoryType = categoryForm.querySelector('select').value;

    const url = `transaction-histories/filterByMonth/${encodeURIComponent(month)}/${encodeURIComponent(categoryType)}`;
    let data = []; 

    fetch(url, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        }
    })
    .then(response => response.json()) 
    .then(responseData => { 
        data = responseData; 
    })
    .catch(error => console.error('Error:', error))
    .finally(() => {
        financeOverviewBody.innerHTML = '';

        if(data.length > 0){
            data.forEach(element => {
                let tr = document.createElement('tr');
                let tdDate = document.createElement('td');
                tdDate.innerHTML = new Date(element.created_at).toLocaleDateString('pt-BR');
                tr.appendChild(tdDate);

                let tdDescription = document.createElement('td');
                tdDescription.innerHTML = element.description;
                tr.appendChild(tdDescription);

                let tdType = document.createElement('td');
                tdType.innerHTML = element.type === 'earning' ? 'Receitas' : 'Gastos'; 
                tr.appendChild(tdType);

                let tdAmount = document.createElement('td');
                tdAmount.innerHTML = 'R$ ' + element.amount; 
                tr.appendChild(tdAmount);

                financeOverviewBody.appendChild(tr); 
            });
        }
    });
});

categoryForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    const categoryType = categoryForm.querySelector('select').value;
    const url = `/transaction-histories/${encodeURIComponent(categoryType)}`;
    let data = []; 

    fetch(url, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        }
    })
    .then(response => response.json()) 
    .then(responseData => { 
        data = responseData; 
    })
    .catch(error => console.error('Error:', error))
    .finally(() => {
        financeOverviewBody.innerHTML = '';

        if(data.length > 0){
            data.forEach(element => {
                let tr = document.createElement('tr');
                let tdDate = document.createElement('td');
                tdDate.innerHTML = new Date(element.created_at).toLocaleDateString('pt-BR');
                tr.appendChild(tdDate);

                let tdDescription = document.createElement('td');
                tdDescription.innerHTML = element.description;
                tr.appendChild(tdDescription);

                let tdType = document.createElement('td');
                tdType.innerHTML = element.type === 'earning' ? 'Receitas' : 'Gastos'; 
                tr.appendChild(tdType);

                let tdAmount = document.createElement('td');
                tdAmount.innerHTML = 'R$ ' + element.amount; 
                tr.appendChild(tdAmount);

                financeOverviewBody.appendChild(tr); 
            });
        }
    });
});
