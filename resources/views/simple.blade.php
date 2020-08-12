@extends('layouts.master')
@section('title', 'Simple')
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
            <h5><STRONG>SEO AUDIT REPORT:</STRONG>ninjareports.com</h5>
        </div>
        <div class="col-md-2">

        </div>
        <div class="col-md-5 text-right">
            <h5>Last Crawled: June 6,2020 10:01AM</h5>
        </div>
    </div>

    <!------------------------------------------ProgressBar Codes----------------------------------------------------->

    <div class="row four-cols">
        <div class="col-md-3">
            <h5>ON-PAGE SEO SCORE</h5>
            <div class="blue" style="margin-top: 12%;">
                <div class="Progress" data-animate="false">
                    <div class="circle" data-percent="88" style="margin-left: 20%;">
                        <div></div>
                    </div>
                </div>
            </div>
            <h6 style="margin-top:23%;">50 Passed</h6>
            <h6>20 Errors</h6>
            <h6>93 Warnings</h6>
            <h6>156 Notices</h6>
        </div>

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


        <div class="col-md-3">
            <h5 style="color: red;">ERRORS</h5>
            <h5 class="number-error">20</h5>
            <p>Lorem ipsum lorem ipsum</p>
            <p>Lorem ipsum lorem ipsum</p>
            <p>Lorem ipsum lorem ipsum</p>
            <p>Lorem ipsum lorem ipsum</p>
            <p>Lorem ipsum lorem ipsum</p>
            <p>Lorem ipsum lorem ipsum</p>
            <p>Lorem ipsum lorem ipsum</p>
            <div class="link-div text-right">
                <a href="">View errors</a>
            </div>
        </div>

        <div class="col-md-3">
            <h5 style="color:orange;">WARNINGS</h5>
            <h5 class="number-error">93</h5>
            <p>Lorem ipsum lorem ipsum</p>
            <p>Lorem ipsum lorem ipsum</p>
            <p>Lorem ipsum lorem ipsum</p>
            <p>Lorem ipsum lorem ipsum</p>
            <p>Lorem ipsum lorem ipsum</p>
            <p>Lorem ipsum lorem ipsum</p>
            <p>Lorem ipsum lorem ipsum</p>
            <div class="link-div text-right">
                <a href="">View Warnings</a>
            </div>
        </div>
        <div class="col-md-3">
            <h5 style="color:lightblue;">NOTICES</h5>
            <h5 class="number-error">156</h5>
            <p>Lorem ipsum lorem ipsum</p>
            <p>Lorem ipsum lorem ipsum</p>
            <p>Lorem ipsum lorem ipsum</p>
            <p>Lorem ipsum lorem ipsum</p>
            <p>Lorem ipsum lorem ipsum</p>
            <p>Lorem ipsum lorem ipsum</p>
            <p>Lorem ipsum lorem ipsum</p>
            <div class="link-div text-right">
                <a href="">View Notices</a>
            </div>

        </div>
    </div>
    <div class="row errors-table">
        <table class="table">
            <h4 style="color: red;padding: 10px;">
                Errors
            </h4>
            <thead>
                <tr>
                <th>URL</th>
                <th>Error</th>
                <th>How to Fix</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>Loremipsum@ipsum</td>
                <td>Lorem Ipsum</td>
                <td>Lorem IpsumLorem IpsumLorem Ipsum</td>
                </tr>
                <tr>
                <td>Loremipsum@ipsum</td>
                <td>Lorem Ipsum</td>
                <td>Lorem IpsumLorem IpsumLorem Ipsum</td>
                </tr>
                <tr>
                <td>Loremipsum@ipsum</td>
                <td>Lorem Ipsum</td>
                <td>Lorem IpsumLorem IpsumLorem Ipsum</td>
                </tr>
                <tr>
                <td>Loremipsum@ipsum</td>
                <td>Lorem Ipsum</td>
                <td>Lorem IpsumLorem IpsumLorem Ipsum</td>
                </tr>
                <tr>
                <td>Loremipsum@ipsum</td>
                <td>Lorem Ipsum</td>
                <td>Lorem IpsumLorem IpsumLorem Ipsum</td>
                </tr>
                <tr>
                <td>Loremipsum@ipsum</td>
                <td>Lorem Ipsum</td>
                <td>Lorem IpsumLorem IpsumLorem Ipsum</td>
                </tr>
                <tr>
                <td>Loremipsum@ipsum</td>
                <td>Lorem Ipsum</td>
                <td>Lorem IpsumLorem IpsumLorem Ipsum</td>
                </tr>

                <tr>
                <td></td>
                <td></td>
                <td class="text-center"><a href="#" style="color: red;">VIEW ALL</a></td>
                </tr>
            </tbody>
            </table>
    </div>
</div>
@endsection
