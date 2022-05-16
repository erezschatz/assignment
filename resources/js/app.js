const displayError = error => {
	alert(error);
};

const populateTable = data => {
    const table = document.getElementById("salesTable");

    data.forEach(item => {
      const row = table.insertRow();
      	let time = row.insertCell(0);
      	time.innerHTML = item.created_at.replace(/([^T]+)T([^.]+)\.0+Z/, '$1 $2');
      	let sale_number = row.insertCell(1);
      	sale_number.innerHTML = '<a href="' + item.sale_url + '">' + item.payme_sale_code + '</a>';
		let description = row.insertCell(2);
      	description.innerHTML = item.product_name;
     	let amount = row.insertCell(3);
     	amount.innerHTML = item.price / 100;
     	let currency = row.insertCell(4);
      	currency.innerHTML = item.currency;
    });
};

const getSales = () => {
	fetch('api/sales')
  		.then(response => response.json())
  		.then(data => populateTable(data));
};

const submitSale = event => {
	event.preventDefault();

	const formData = new FormData();
	formData.append('productname', document.getElementById('productname').value);
	formData.append('price', document.getElementById('price').value);
	formData.append('currency', document.getElementById('currency').value);

	fetch('api/sales', {
		method : 'POST',
		body: formData
	})
  	.then(response => response.json())
  	.then(data => {
		if(data.status_code === 0) {
			window.location.reload();
		} else {
			displayError(data.status_error_details);
		}
	})
	.catch(error => {
  		displayError('Error:', error);
	});
};

const form = document.getElementById('saleForm');
form.addEventListener('submit', submitSale);
window.addEventListener('load', getSales);
