<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Payme Test</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
<div class="container">
  <div class="row justify-content-md-center">
	<div class="col-md-auto bg-info">
	<h1>New Sale Creation</h1>
	<form id="saleForm">
  <div class="mb-3">
    <label for="productname" class="form-label">Product Name</label>
    <input type="text" class="form-control" id="productname" aria-describedby="productname">
  </div>
  <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="number" class="form-control" id="price">
 	<div id="priceHelp" class="form-text">The price has to be a valid whole or decimal number</div>
  </div>
  <div class="mb-3">
	<label class="form-label" for="currency">Currency</label>
    <select class="form-select" aria-label="currency select" id="currency">
  <option value="ILS">ILS</option>
  <option value="USD">USD</option>
  <option value="EUR">EUR</option>
</select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form> 
</div></div></div>
<div class="container">
	<div class="row">
<table class="table" id="salesTable">
  <thead>
    <tr>
      	<th scope="col">Time</th>
      	<th scope="col">Sale Number</th>
      	<th scope="col">Description</th>
      	<th scope="col">Amount</th>
		<th scope="col">Currency</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>
	</div></div>
	<script src="js/app.js"></script>
  </body>
</html>