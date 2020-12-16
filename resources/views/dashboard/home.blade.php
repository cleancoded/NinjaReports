@extends('layouts.master')
@section('title', 'Home')
@section('content')

<div class="col-md-10  overview">
    <div class="row audit-text pt-3 pb-3">
        <div class="col-md-12 text-start">
            <h3 style="margin-left: 25px;"><STRONG>Welcome!</STRONG></h3>
        </div>
    </div>
    <div class="row Welcome-two-cols">
        <div class="col-md-6 text-center Quick-col">
            <h3>QUICK ANALYSIS</h3>
            <p>Enter your URL to start a quick SEO analysis of your page. Ninja Reports scans your website for 50+ SEO factors and tells you how to fix them.</p>
                <div class="row">
                    <div class="col-md-9">
                        <input type="text" class="form-control url" placeholder="Enter URL">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary" class="analyze" id='analsis'>ANALYZE</button>
                    </div>
                </div>
        </div>
        <div class="col-md-6 plan-col">
            <h6><span>Plan: </span><span>
             @if(!empty($product))
                    <span>{{$product->name}}</span>
                @else
                    <span>Free plan</span>
                @endif</span></h6>
            <a href="{{route('subscription')}}" class="btn btn-warning">Upgrade</a>
        </div>
    </div>

        <div class="row Welcome-two-cols ">
        <div class="col-md-6 guide-box">
            <h5>How to Guides:</h5>
            <p></p>
              <ul>
                <li><a target="_blank" href="https://ninjareports.zendesk.com/hc/en-us/articles/360059931273">How to Run an Analysis</a></li>
                <li><a target="_blank" href="https://ninjareports.zendesk.com/hc/en-us/articles/360058188953">How to Run an Audit</a></li>
                <li><a target="_blank" href="https://www.ninjareports.com/on-page-seo-guide/">How to Fix SEO Issues</a></li>
              </ul>
        </div>
        <div class="col-md-6 guide-box">
             <h5>Recent SEO Articles:</h5>
            <p></p>
              <ul>
                <li><a target="_blank" href="https://www.ninjareports.com/internal-linking-guide/">Internal Linking Guide</a></li>
                <li><a target="_blank" href="https://www.ninjareports.com/how-to-do-an-seo-audit/">How to do an SEO Audit</a></li>
                <li><a target="_blank" href="https://www.ninjareports.com/on-page-seo-guide/">Beginners Guide to On-Page SEO</a></li>
              </ul>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>
    $(document).ready(function($){
        var loggedIn = {{ auth()->check() ? 'true' : 'false' }};

        $("#analsis").click(function(e){
            var j$ = jQuery.noConflict();
            e . preventDefault();
            if(loggedIn){
                var url =  j$(".url").val();
                if(url){
                    window.location ="/analysis"+'?url='+url;
                }else{
                    window.location ="/analysis";
                }
            }else{
                j$("#loginModal").modal("show");
                $("#login_btn").click(function(e){
                    var analyze_url = $(".url").val();
                    if(analyze_url){
                        window.location ="/login?page="+"/analysis"+"&url="+analyze_url;
                    }else{
                        window.location ="/login?page="+"/analysis";
                    }
                });
            }
        });
    });
</script>
@endsection
