@extends('layouts.master')
@section('title', 'SEO Analysis')
@section('content')
<div class="col-md-10  overview">
    <div class="row Analyze">
                <div class="col-md-10">
                    <input type="text" class="form-control" placeholder="Analyze">
                </div>
                <div class="col-md-2">
                    <button class="btn">Analyze</button>
                </div>
    </div>
    <div class="row progressbar">
                <div class="col-md-12">
                    <div class="progress">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70"
                        aria-valuemin="0" aria-valuemax="100" style="width:70%">
                        Crawling Pages...
                        </div>
                    </div>
                </div>
    </div>
    <div class="row audit-text pt-3 pb-3">
            <div class="col-md-5">
                <h5><STRONG>SEO Analysis:</STRONG>ninjareports.com</h5>
            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-5 text-right">
                <h5>June 6,2020 10:01AM</h5>
            </div>
    </div>

    <section id="analysis">
        <div class="row Analysis-details" style="border:1px solid #f4f4f4;padding: 6px;">
            <div class="col-md-2">
                <img src="images/desktop.jpg" style="height:140px;margin-top:15%;margin-left:5%;">
            </div>
            <div class="col-md-6" style="padding-top: 1%;padding-left: 5%;">
                <h5><a href="#">ninjareports.com</a></h5>
                <h6 style="width: 17%;float: left;margin-right: 20px;">
                    <span><img src="images/green.png"></span>
                    Passed
                </h6>
                <div class="progress" style="margin-bottom:5px;width: 70%;float: left;">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
                        aria-valuemin="0" aria-valuemax="100" style="width:40%;background-color: green;">
                        </div>
                </div>
                <div class="clear"></div>
                <h6 style="width: 17%;float: left;margin-right: 20px;">
                    <span><img src="images/orange.png"></span>
                    Warning
                </h6>
                <div class="progress" style="margin-bottom:5px;width: 70%;float: left;">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50"
                        aria-valuemin="0" aria-valuemax="100" style="width:50%;background-color: orange;">
                        </div>
                </div>
                <div class="clear"></div>
                <h6 style="width: 17%;float: left;margin-right: 20px;">
                    <span><img src="images/red.png"></span>
                    Errors
                </h6>
                <div class="progress" style="margin-bottom:5px;width: 70%;float: left;">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60"
                        aria-valuemin="0" aria-valuemax="100" style="width:60%;background-color: red;">
                        </div>
                </div>
                <div class="clear"></div>
                <h6 style="width: 17%;float: left;margin-right: 20px;">
                    <span><img src="images/blue.jpg"></span>
                    Notices
                </h6>
                <div class="progress" style="margin-bottom:5px;width: 70%;float: left;">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70"
                        aria-valuemin="0" aria-valuemax="100" style="width:70%;background-color: blue;">
                        </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="col-md-4" style="margin-bottom:5px;">
                <div class="blue" style="margin-left: 12%;">
                    <div class="Progress" data-animate="false">
                    <div class="circle" data-percent="58" style="margin-left: 20%;">
                        <div></div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id='header'>
        <h2 style="margin-bottom: 30px;margin-top: 30px;">Header</h2>
        <div class="heading-section">

            <div class="row">
                <div class="col-md-3">
                    <h6><span><img src="images/green.png"></span>Title Tag</h6>
                </div>
                <div class="col-md-9">
                    <h6>Ninja Report Meta Title - Ninja Reports</h6>
                    <p>Length: 67 Characters (recommended: 60 characters)</p>
                </div>
            </div>
                <hr>
            <div class="row">
                <div class="col-md-3">
                    <h6><span><img src="images/green.png"></span>Meta Description</h6>
                </div>
                <div class="col-md-9">
                    <p>Ninja Reports sends automated SEO reports,PPC Reports and Facebook Ads reports.Signup for a free trial today and try it now!</p>
                    <p>Length: 67 Characters (recommended: 60 characters)</p>
                </div>
            </div>
                <hr>
            <div class="row">
                <div class="col-md-3">
                    <h6><span><img src="images/green.png"></span>Canonical</h6>
                </div>
                <div class="col-md-9">
                    <p>https://www.ninjareports.com</p>
                </div>
            </div>
                <hr>
            <div class="row">
                <div class="col-md-3">
                    <h6><span><img src="images/gray.jpg"></span>Google Preview</h6>
                </div>
                <div class="col-md-9">

                </div>
            </div>
        </div>
    </section>
    
    <section id='technical'>
        <h2 style="margin-bottom: 30px;margin-top: 30px;">Technical</h2>
        <div class="Technical-section">

            <div class="row">
                <div class="col-md-3">
                    <h6><span><img src="images/green.png"></span>Schema Tags</h6>
                </div>
                <div class="col-md-9">
                    <h6>Organisation, Service</h6>
                    <p>No Schema Errors</p>
                </div>
            </div>
                <hr>
            <div class="row">
                <div class="col-md-3">
                    <h6><span><img src="images/orange.png"></span>Alt Tags</h6>
                </div>
                <div class="col-md-9">
                    <p>7 images are missing alt tags.(56 images passed)</p>
                    <p style="margin-bottom: 0;">https://www.ninjareports.com/images/altness.png</p>
                    <p style="margin-bottom: 0;">https://www.ninjareports.com/images/altness.png</p>
                    <p style="margin-bottom: 0;">https://www.ninjareports.com/images/altness.png</p>
                    <p style="margin-bottom: 0;">https://www.ninjareports.com/images/altness.png</p>
                    <p style="margin-bottom: 0;">https://www.ninjareports.com/images/altness.png</p>
                </div>
            </div>
                <hr>
            <div class="row">
                <div class="col-md-3">
                    <h6><span><img src="images/green.png"></span>SEO Friendly URL</h6>
                </div>
                <div class="col-md-9">
                    <p>https://www.ninjareports.com</p>
                </div>
            </div>
                <hr>
            <div class="row">
                <div class="col-md-3">
                    <h6><span><img src="images/red.png"></span>Flash/Iframes</h6>
                </div>
                <div class="col-md-9">
                    <p>You are using an Iframe on your page.Iframes can't be crawled by search engnies and aren't good for SEO, in General</p>
                </div>
            </div>
            </div>
        </div>
    </section>


    <!------------------------------------------Animation Script ProgressBarStart----------------------------------------------------->

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
            <script src="https://rawgit.com/kottenator/jquery-circle-progress/1.2.1/dist/circle-progress.js"></script>
            <script src="scripts/index.js"></script>
            <Script>
            /**
                * index.js
                * - All our useful JS goes here, awesome!
                Maruf-Al Bashir Reza
                */

            console.log("JavaScript is amazing!");
            $(document).ready(function($) {
                function animateElements() {
                $('.Progress').each(function() {
                    var elementPos = $(this).offset().top;
                    var topOfWindow = $(window).scrollTop();
                    var percent = $(this).find('.circle').attr('data-percent');
                    var percentage = parseInt(percent, 10) / parseInt(100, 10);
                    var animate = $(this).data('animate');
                    if (elementPos < topOfWindow + $(window).height() - 30 && !animate) {
                    $(this).data('animate', true);
                    $(this).find('.circle').circleProgress({
                        startAngle: -Math.PI / 2,
                        value: percent / 100,
                        thickness: 14,
                        fill: {
                        color: '#1B58B8'
                        }
                    }).on('circle-animation-progress', function(event, progress, stepValue) {
                        $(this).find('div').text((stepValue * 100).toFixed(1) + "%");
                    }).stop();
                    }
                });
                }

                // Show animated elements
                animateElements();
                $(window).scroll(animateElements);
            });

            </Script>



            <!------------------------------------------Animation Script ProgressBar End----------------------------------------------------->




</div>

@endsection
