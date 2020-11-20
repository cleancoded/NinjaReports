@extends('layouts.master')
@section('title', 'Account')
@section('content')
<style>
     .container{
        display: flex;
        flex-direction: column;
        background-color: #E6E6FA;
        height:45%;
        box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
    }
    .content{
        position:absolute;
        padding-top: 5%;
    }
    .img-box{
        padding-top: 4%;
    }
    #profile-img { 
        width: 12%;
        border-radius: 7px;
    }
    .change{
        margin-top:19%;
    }
    .newbtn{
        padding: 10px;
        color: white;
        text-decoration: none;
    }
    .newbtn:hover{
        color:white;
        text-decoration:none;
        opacity: 0.5;
    }
    .delete{
        background-color:#f15353;
    }
    .upgrade{
        background-color:#4698ed;
    }
    .cancel{
        background-color:#c8a110;
    }
    h4{
        padding-left: 55px;
    }
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
    <div class="container">
        <div class="img-box">
            <img src="{{ Auth::user()->picture }}" id="profile-img"> 
        </div>

        <div class="content">
            <span>Name:</span>
            <h4>{{Auth::user()->name}}</h4>
            <span>Email:</span>
            <h4>{{ Auth::user()->email }}</h4>
            <span>Plan:</span>
            <h4>
                @if(!empty($product) && $status == 1)
                    <p>You are using the {{$product->name}} plan.</p>
                @else
                    <p>You are using the Free plan.</p>
                @endif 
            </h4>
        </div>

        <div class="change">
            <a href="/destroy/{{ Auth::user()->id }}" class="newbtn delete">Delete Account</a>
            <a class="newbtn upgrade" href="{{route('subscription')}}">Upgrade Plan</a>
            <a class="newbtn cancel" href="{{route('cancel')}}">Cancel Plan</a>
        </div>
    </div>     
</div>
@endsection