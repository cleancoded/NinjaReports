@extends('layouts.master')
@section('title', 'SEO Audit')
@section('content')
<div class="col-md-10  overview">
       <div id="tool-desc" class="row">

        <div class="col-md-12">
        <h3>SEO Audit</h3>
        <p>Enter your domain into the toolbar including https:// or http:// and Ninja Reports will scan your entire website and check over 55+ SEO factors and tell you know how to fix them and rank higher.</p>
    </div>

</div>
    <div class="row Analyze">
        <div class="col-md-10">
            <input type="text" id="seo_audit" class="form-control" value="{{$_GET['url'] ?? ''}}" placeholder="Enter URL">
        </div>
        <div class="col-md-2">
            <button class="btn">CRAWL</button>
        </div>
    </div>
    <div class="row progressbar">
        <div class="col-md-12">
            <div class="progress">
                <div class="progress-bar1" style="width: 100%;"></div>
            </div>
            <!-- <div class="progress">
                <div class="progress-bar progress-bar-danger" id="progress" role="progressbar" aria-valuenow="70"
                aria-valuemin="0" aria-valuemax="100" style="width:0%">
                Crawling Pages...
                </div>
            </div> -->
        </div>
    </div>
        <div id="waiting" style="display:none;">
        <div class="loading-box">
            <img src="{{asset('images/806.gif')}}" alt="loading"/>
            <h4>Crawling...</h4>
            <p>Please wait while we crawl your pages. This process can take a few minutes.</p>
        </div>
    </div>
    <div id="text-container"></div>
     <!------------------------------------------Animation Script ProgressBarStart----------------------------------------------------->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://rawgit.com/kottenator/jquery-circle-progress/1.2.1/dist/circle-progress.js"></script>
    <!-- <script src="scripts/index.js"></script> -->
    <Script>

        /**
            * index.js
            * - All our useful JS goes here, awesome!
            Maruf-Al Bashir Reza
            */
        function insertParam(key, value) {
                key = encodeURIComponent(key);
                value = encodeURIComponent(value);

                // kvp looks like ['key1=value1', 'key2=value2', ...]
                var kvp = document.location.search.substr(1).split('&');
                let i=0;

                for(; i<kvp.length; i++){
                    if (kvp[i].startsWith(key + '=')) {
                        let pair = kvp[i].split('=');
                        pair[1] = value;
                        kvp[i] = pair.join('=');
                        break;
                    }
                }

                if(i >= kvp.length){
                    kvp[kvp.length] = [key,value].join('=');
                }

                // can return this or...
                let params = kvp.join('&');

                // reload page with new params
                document.location.search = params;
            }

        $(document).ready(function($) {
           
            $(".progress-bar1").css("animation-play-state", "paused");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var loggedIn = {{ auth()->check() ? 'true' : 'false' }};
            var analyze_url =  $("#seo_audit").val();
            if (analyze_url && loggedIn) {
                if(isUrl(analyze_url) != false){
                    $(".progress-bar1").css("animation-play-state", "running");
                    get_audit();
                }else{
                    //alert("The link doesn't have http or https");
                }    
            }
           

            $(".btn").click(function(e){
                    e.preventDefault();
                    var url =  $("#seo_audit").val();
                    if(loggedIn){
                        !!url && insertParam('url', url);
                        //get_audit();
                    }else{
                        var j$ = jQuery.noConflict();
                        j$("#loginModal").modal("show");
                        $("#login_btn").click(function(e){
                            var analyze_url = $("#seo_audit").val();
                            if(analyze_url){
                                window.location ="/login?page="+document.location.href+"&url="+analyze_url;
                            }else{
                                window.location ="/login?page="+document.location.href;
                            }
                        });
                    }
                });
                function get_audit(){
                    var url =  $("#seo_audit").val();
                    
                        if(url.length != 0){
                            if(isUrl(url) !== false){
                                $(".progress-bar1").css("animation-play-state", "running");
                                $.ajax({
                                    xhr : function() {
                                        var xhr = new window.XMLHttpRequest();
                                        xhr.upload.addEventListener('progress', function(e) {
                                            if (e.lengthComputable) {
                                                var percent = Math.round((e.loaded / e.total) * 100)-60;
                                                //console.log(percent);
                                                $('#waiting').show();
                                                $('#analyse').attr('disabled','disabled');
                                                $('#progress').attr('aria-valuenow', percent).css('width', percent + '%').text(percent + '%');
                                            }
                                        });
                                        return xhr;
                                    },
                                    type:'POST',
                                    url:'/seo_audit',
                                    data:{url:url},
                                    
                                    success:function(data){
                                        if(data == 'unsuccessfull'){
                                            var msg = "<?php echo base64_encode('Please Subscribe plan');?>";
                                            var url = '/subscription?success='+msg;
                                            window.location = url;
                                        }else if(data == 'Expired'){
                                            var msg = "<?php echo base64_encode('Your Subscription Expired');?>";
                                            var url = '/account?success='+msg;
                                            window.location = url;
                                        }else if(data == 'acceded'){
                                            var msg = "<?php echo base64_encode('You are acceded');?>";
                                            var url = '/account?success='+msg;
                                            window.location = url;
                                        }
                                        else{
                                            $('#progress').css('width', 100 + '%').text(100 + '%'); 
                                            $('div#text-container').append(data);
                                            $('.audit-item').show();
                                            animateElements();
                                            $(".progress-bar1").css("animation-play-state", "paused");
                                            $('#waiting').hide();
                                        }
                                    }
                                });
                        }else{
                            alert("The link doesn't have http or https");
                        }
                    }else{
                        alert('add url');
                    }
                }

            // var j$ = jQuery.noConflict();
            
            // //console.log(loggedIn);
            // if (!loggedIn){
            //     $(".btn").click(function(){
            //         j$('#loginModal').modal('show');
            //         $("#login_btn").click(function(e){
            //             var analyze_url = $("#seo_audit").val();
            //             if(analyze_url){
            //                 window.location ="/login?page="+document.location.href+"&url="+analyze_url;
            //             }else{
            //                 window.location ="/login?page="+document.location.href;
            //             }
            //         });
            //     });
            // }




            function animateElements() {
                $('.Progress').each(function() {
                    var elementPos = $(this).offset().top;
                    var topOfWindow = $(window).scrollTop();
                    var percent = $(this).find('.circle').attr('data-percent');
                    console.log(percent);
                    var percentage = parseInt(percent, 10) / parseInt(100, 10);
                    var animate = $(this).data('animate');
                    if (elementPos < topOfWindow + $(window).height() - 30 && !animate) {
                        $(this).data('animate', true);
                        $(this).find('.circle').circleProgress({
                            startAngle: -Math.PI / 2,
                            value: percent / 100,
                            thickness: 15,
                            size: 175,
                            lineCap: "round",
                            emptyFill: "#f2f2f2",
                            fill: {
                            color: '#1B58B8'
                            }
                        }).on('circle-animation-progress', function(event, progress, stepValue) {
                            $(this).find('div').text((stepValue * 100).toFixed(0) + "%");
                        }).stop();
                    }
                });
            }

            // Show animated elements
            
           // $(window).scroll(animateElements);
           function isUrl(s) {
                    var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
                            return regexp.test(s);
                    }
        });


    </Script>
    <!------------------------------------------Animation Script ProgressBar End----------------------------------------------------->
</div>
@endsection
