@extends('layouts.master')
@section('title', 'Stripe Checkout')
@section('content')
<style>
		/**
	* The CSS shown here will not be introduced in the Quickstart guide, but shows
	* how you can use CSS to style your Element's container.
	*/
	/* body{
		background-color: #eee;
	} */
	.StripeElement {
	box-sizing: border-box;
	width: 98%;
	height: 40px;

	padding: 10px 12px;

	border: 1px solid #ccc;
	border-radius: 4px;
	background-color: white;
	margin-left: 4px;
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
		background-color: #eee;
		position: absolute;
		top: 50%;
		left: 50%;
		-ms-transform: translate(-50%, -50%);
		transform: translate(-50%, -50%);
		width:80%;
		height:70vh;
		border:1px solid #ccc;
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
		padding: 7px 30% 10px 37%;
		border-radius: 3px;
		margin-bottom: -10px;

	}
	#payment-form{
		margin-top:12px;
	}
	h1{
		margin-left: 16%;
	}
</style>

<script src="https://js.stripe.com/v3/"></script>
<div class="col-md-10  overview">
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
</div>
<script src="https://js.stripe.com/v3/"></script>
<script>
	// Create a Stripe client.
	var stripe = Stripe('sk_test_R5yp5YcSzHXQFP41vvKCSh9v');

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
@endsection