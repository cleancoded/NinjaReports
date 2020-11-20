@extends('layouts.master')
@section('title', 'Account')
@section('content')
<div class="overview">
    @if(!empty($_GET['success']))
        <div class="alert alert-success mt-4">
            <?php echo base64_decode($_GET['success']); ?>
        </div>
    @endif   
        <h1>Subscription Page</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Webmaster</h5>
                    <p class="card-text">$29/Month</p>
                    <a href="{{route('payment',['id' => 1])}}" class="btn btn-primary">Free Trial</a>
                </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Business</h5>
                    <p class="card-text">$49/Month</p>
                    <a href="{{route('payment',['id' => 2])}}" class="btn btn-primary">Free Trial</a>
                </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Agency</h5>
                    <p class="card-text">$99/Month</p>
                    <a href="{{route('payment',['id' => 3])}}" class="btn btn-primary">Free Trial</a>
                </div>
                </div>
            </div>
        </div>    
</div>
@endsection