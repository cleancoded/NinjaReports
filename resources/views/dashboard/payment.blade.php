<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
</head>
<style>
		/**
	* The CSS shown here will not be introduced in the Quickstart guide, but shows
	* how you can use CSS to style your Element's container.
	*/
	body{
		background-color: azure;
	}
	.StripeElement {
	box-sizing: border-box;

	height: 40px;

	padding: 10px 12px;

	border: 1px solid transparent;
	border-radius: 4px;
	background-color: white;

	box-shadow: 0 1px 3px 0 #e6ebf1;
	-webkit-transition: box-shadow 150ms ease;
	transition: box-shadow 150ms ease;
	}

	.StripeElement--focus {
	box-shadow: 0 1px 3px 0 #cfd7df;
	}

	.StripeElement--invalid {
	border-color: #fa755a;
	}

	.StripeElement--webkit-autofill {
	background-color: #fefde5 !important;}
	.pay{
		width:50%;  
	}
	.container{	
		margin: 0;
		background-color: aliceblue;
		position: absolute;
		top: 50%;
		left: 50%;
		-ms-transform: translate(-50%, -50%);
		transform: translate(-50%, -50%);
		width:80%;
		height:70vh;
		box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.btn{
	display: block;
	width: 100%;
	border: none;
	background-color: #9e28b4;
	color: white;
	padding: 9px 28px;
	font-size: 16px;
	cursor: pointer;
	text-align: center;
	border-radius: 3px;
	}
	.label{
		width: 100% !important;
		background: #6cadad;
		padding: 8px 40% 10px 37%;
		border-radius: 3px;
	}
	#payment-form{
		margin-top:12px;
	}
	h1{
		margin-left: 29%;
	}
</style>
<body>
	

<script src="https://js.stripe.com/v3/"></script>
<div class="container">
	
	<div class="pay">
		<h1>Stripe Checkout</h1>
			<label for="card-element" class="label label-primary">
				Credit or debit card
			</label>
			<form action="/stripe/{{$id}}" method="post" id="payment-form">
			@csrf
			<input type="hidden" value="{{$id}}">
			<div class="form-row">
				
				<div id="card-element">
				<!-- A Stripe Element will be inserted here. -->
				</div>

				<!-- Used to display form errors. -->
				<div id="card-errors" role="alert"></div>
			</div>

			<button class="btn">Submit Payment</button>
		</form>
		
	</div>
</div>
</body>
</html>
<script src="https://js.stripe.com/v3/"></script>
<script>
	// Create a Stripe client.
	var stripe = Stripe('pk_test_51HoNAJJ6zlhCKixlq6PFXRVd9iKFwIa6xXJKWeS9bi7O2qqy25stwBEh5B4iD2ssVD9T2rZbVGJiFAIDOO9WCgkc00P51hwNrV');

	// Create an instance of Elements.
	var elements = stripe.elements();

	// Custom styling can be passed to options when creating an Element.
	// (Note that this demo uses a wider set of styles than the guide below.)
	var style = {
	base: {
		color: '#32325d',
		fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
		fontSmoothing: 'antialiased',
		fontSize: '16px',
		'::placeholder': {
		color: '#aab7c4'
		}
	},
	invalid: {
		color: '#fa755a',
		iconColor: '#fa755a'
	}
	};

	// Create an instance of the card Element.
	var card = elements.create('card', {style: style});

	// Add an instance of the card Element into the `card-element` <div>.
	card.mount('#card-element');
	// Handle real-time validation errors from the card Element.
	card.on('change', function(event) {
	var displayError = document.getElementById('card-errors');
	if (event.error) {
		displayError.textContent = event.error.message;
	} else {
		displayError.textContent = '';
	}
	});

	// Handle form submission.
	var form = document.getElementById('payment-form');
	form.addEventListener('submit', function(event) {
	event.preventDefault();

	stripe.createToken(card).then(function(result) {
		if (result.error) {
		// Inform the user if there was an error.
		var errorElement = document.getElementById('card-errors');
		errorElement.textContent = result.error.message;
		} else {
		// Send the token to your server.
		stripeTokenHandler(result.token);
		}
	});
	});

	// Submit the form with the token ID.
	function stripeTokenHandler(token) {
	// Insert the token ID into the form so it gets submitted to the server
	var form = document.getElementById('payment-form');
	var hiddenInput = document.createElement('input');
	hiddenInput.setAttribute('type', 'hidden');
	hiddenInput.setAttribute('name', 'stripeToken');
	hiddenInput.setAttribute('value', token.id);
	form.appendChild(hiddenInput);

	// Submit the form
	form.submit();
	}
</script>
