@extends('layouts.master')
@section('title', 'Account')
@section('content')
<div class="col-md-10 overview">
@if(session()->has('message'))
    <div class="alert alert-success mt-4">
        {{ session()->get('message') }}
    </div>
@endif
@if(!empty($_GET['success']))
        <div class="alert alert-success mt-4">
            <?php echo base64_decode($_GET['success']); ?>
        </div>
@endif   
        <div class="row mt-5">
            <div class="float-left">
                <h5>Email:</h5>
                <img src="{{ Auth::user()->picture }}" style="height: 30px;border-radius: 50%;"> {{ Auth::user()->email }} 
                <a href="/destroy/{{ Auth::user()->id }}" class="btn btn-secondary">Delete Account</a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="float-left">
                <h5>Your Plain</h5>
                @if(!empty($product) && $status == 1)
                    <p>You are using the {{$product->name}}</p>
                @else
                    <p>You are using the Free plan</p>
                @endif 
                <a class="btn btn-primary" href="{{route('subscription')}}">Upgrade</a>
            </div>
        </div>
       
        @if(!empty($product) && $status == 1)
            <div class="row mt-5">
                <div class="float-left">
                    <h5>Cancel Subscription</h5>
                    <a class="btn btn-warning" href="{{route('cancel')}}">cancel</a>
                </div>
            </div>
        @endif
</div>
@endsection