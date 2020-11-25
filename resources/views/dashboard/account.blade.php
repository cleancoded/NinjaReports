@extends('layouts.master')
@section('title', 'Account')
@section('content')
<style>
     .container{
        display: flex;
        flex-direction: column;
        background-color: #fff;
        height:45%;
        border:1px solid #ddd;
    }
    .content{
        position:absolute;
        padding-top: 5%;
    }
    .img-box{
        padding-top: 25px;
    }
    #profile-img { 
       width: 100px;
    border-radius: 50%;
    }
    .change{
        list-style-type: none;
    }
    .change li {margin:10px 0;}
    .change li a {width:100%;}

    .account-container{margin-top:20px;}
    .account-container label {font-weight:bold;}
    .account-container .details{margin-top:25px;list-style-type:none;padding-left:5px;}
</style>
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
<div class="my-account">
    <div class="row">
<div class="col-md-12">
<h1>My Account</h1>
</div>
    </div>
    <div class="row">
        <div class="col-md-8 account-container">
            <div class="row">
        <div class="col-md-5">
            <div class="img-box">
            <img src="{{ Auth::user()->picture }}" id="profile-img"> 
        </div>
         <ul class="details">
           <li> <label>Name:</label>
            <span>{{Auth::user()->name}}</span></li>
           <li> <label>Email:</label>
            <span>{{ Auth::user()->email }}</span></li>
           <li> <label>Plan:</label>
                @if(!empty($product) && $status == 1)
                    <span>{{$product->name}} plan</span>
                @else
                    <span>Free plan</span>
                @endif 
                </li>
        </ul>
        </div>
        <div class="col-md-5">
              <ul class="change">
           
            <li><a class="btn btn-success upgrade" href="{{route('subscription')}}">Upgrade Plan</a></li>
            <li><a class="btn btn-warning cancel" href="{{route('cancel')}}">Cancel Plan</a></li>
            <li><a href="/destroy/{{ Auth::user()->id }}" class="btn btn-danger delete">Delete Account</a></li>
            <span style="font-size:13px;"><i class="fa fa-info-circle" aria-hidden="true"></i> Deleting your account will remove all data from our system.</span>
        </div>
        <div class="col-md-2">
        </div>
        </div>
    </div>
</div>

     

      
      </div> 
</div>
@endsection