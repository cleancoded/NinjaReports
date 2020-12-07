@extends('layouts.master')
@section('title', 'SEO Analysis')
@section('content')
<div class="col-md-10  overview">
        <div id="tool-desc" class="row">

        <div class="col-md-12">
        <h3>SEO Analysis</h3>
        <p>Enter your URL into the toolbar including https:// or http:// and Ninja Reports will scan the page for over 55+ SEO factors. Analyze your URL to see how you can get better rankings in search engines.</p>
    </div>

</div>
    <form id='analyse_form'>
        <div class="row Analyze">
            <div class="col-md-10">

                <input type="text" id='analyze' class="form-control" value="{{$_GET['url'] ?? ''}}"  placeholder="Enter URL">

            </div>
            <div class="col-md-2">
                <button class="btn" id='analyse'>Analyze</button>
            </div>
        </div>
    </form>
    
    <div class="row progressbar">
        <div class="col-md-12" id="progress_bar">
            <div class="progress">
                <div class="progress-bar1" style="width: 100%;"></div>
            </div>
            <!-- <div class="progress">
                <div class="progress-bar progress-bar-danger" id="progressBar" role="progressbar" aria-valuenow="0"
                aria-valuemin="0" aria-valuemax="100" style="width:0%">
                
                </div>
            </div> -->
        </div>
    </div>
      <div id="waiting" style="display:none;">
        <div class="loading-box">
            <img src="{{asset('images/806.gif')}}" alt="loading"/>
            <h4>Crawling...</h4>
            <p>Please wait while we crawl your page. This process can take a few minutes.</p>
        </div>
    </div>
    <div id="text-container"></div>



    <!------------------------------------------Animation Script ProgressBarStart----------------------------------------------------->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://rawgit.com/kottenator/jquery-circle-progress/1.2.1/dist/circle-progress.js"></script>
        <!-- <script src="scripts/index.js"></script> -->
        <script>
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
                            thickness: 13,
                            size: 190,
                            lineCap: "round",
                            emptyFill: "#f2f2f2",
                            fill: {
                            color: '#1B58B8'
                            }
                        }).on('circle-animation-progress', function(event, progress, stepValue){
                            $(this).find('div').text((stepValue * 100).toFixed(0) + "%");
                        }).stop();
                        }
                    });
                }

                // Show animated elements
                
               //$(window).scroll(animateElements);

               // <!------------------------------------------Animation Script ProgressBar End----------------------------------------------------->


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var loggedIn = {{ auth()->check() ? 'true' : 'false' }};
                var analyze_url =  $("#analyze").val();
                
                    if(analyze_url && loggedIn){
                        if(isUrl(analyze_url) != false){
                            $(".progress-bar1").css("animation-play-state", "running");
                            analyzeURL();
                        }else{
                            //alert("The link doesn't have http or https");
                        }
                    }
               

                $(".btn").click(function(e){
                    e . preventDefault();
                    
                    if(loggedIn){
                        var url =  $("#analyze").val();
                        !!url && insertParam('url', url);
                            //analyzeURL();
                    }else{
                        var j$ = jQuery.noConflict();
                        j$("#loginModal").modal("show");
                        $("#login_btn").click(function(e){
                            var analyze_url = $("#analyze").val();
                            if(analyze_url){
                                window.location ="/login?page="+document.location.href+"&url="+analyze_url;
                            }else{
                                window.location ="/login?page="+document.location.href;
                            }
                        });
                    }
                });

                function analyzeURL(){
                    var url =  $("#analyze").val();
                    if(url.length != 0){
                    if(isUrl(url) != false){
                        
                            $(".progress-bar1").css("animation-play-state", "running");
                            $.ajax({
                                xhr : function() {
                                    var xhr = new window.XMLHttpRequest();
                                    
                                    xhr.upload.addEventListener('progress', function(e) {
                                        if (e.lengthComputable) {
                                            var percent = Math.round((e.loaded / e.total) * 100)-60;
                                            //console.log(percent);
                                            $('#waiting').show();
                                            $('#tool-desc').slideUp();
                                             $('#analyse').attr('disabled','disabled');
                                            $('#progressBar').attr('aria-valuenow', percent).css('width', percent + '%').text(percent + '%');
                                        }
                                    });
                                    return xhr;
                                },
                                
                                type:'POST',
                                url:'/seo',
                                data:{url:url},
                                success:function(data){
                                    //console.log(data);
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
                                    }else if(data == 'upgrade'){
                                        $('#waiting').hide();
                                        $('#myModal').show();
                                        //alert('upgrade for more analysis');
                                    }
                                    else{
                                        $('div#text-container').append(data);
                                        $('.analysis_section').show();
                                        $('#progressBar').css('width', 80 + '%').text(80 + '%');
                                        runPagespeed();
                                        $('#analyse').removeAttr('disabled');
                                        animateElements();
                                        
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

                function setUpQuery() {
                    const api = 'https://www.googleapis.com/pagespeedonline/v5/runPagespeed';
                    const url =  $("#analyze").val();
                    const parameters = {
                        url: encodeURIComponent(url)
                    };
                    let query = `${api}?`;
                    for (key in parameters) {
                        query += `${key}=${parameters[key]}`;
                    }
                    return query;
                }

                function runPagespeed() {
                    const url = setUpQuery();
                    fetch(url)
                        .then(response => response.json())
                        .then(json => {
                            const lighthouse = json.lighthouseResult;
                            var image = new Image();
                                image.src = lighthouse.audits['final-screenshot']['details']['data'];
                                $("#image").append(image); 
                            var score = Math.round(lighthouse.categories.performance['score'] * 100);
                            console.log(score);
                            var unminified_css = lighthouse.audits['unminified-css']['numericValue'];
                            var unminified_js = lighthouse.audits['unminified-javascript']['numericValue'];
                            try {
                                var wastBytes_css = lighthouse.audits['unminified-css']['details']['items'][1]['wastedBytes'];
                                if(wastBytes_css){
                                    $("#css_minified").append("Your CSS is not minified. Minifying your CSS can help speed up your website which will improve SEO and user experience");
                                    var get_passed = document.getElementById("warning").style.width;
                                    var add_vale = parseFloat(get_passed) + 3.7;
                                    $("#warning").css("width", add_vale + "%");
                                    $("#img_err").attr("class", "fa fa-exclamation-circle");
                                    $("#img_color").css('color','#ff6600');
                                }
                            }
                            catch(err) {
                                $("#css_minified").append("CSS is minified");
                                var get_passed = document.getElementById("passed_progress").style.width;
                                var add_vale = parseFloat(get_passed) + 3.7;
                                $("#passed_progress").css("width", add_vale + "%");

                            }

                            try {
                                var wastBytes_js = lighthouse.audits['unminified-javascript']['details']['items'][1]['wastedBytes'];
                                if(wastBytes_js){
                                    $("#js_minified").append("Your JS is not minified. Minifying your files and code can help speed up your website which will improve SEO and user experience");
                                    var get_passed = document.getElementById("warning").style.width;
                                    var add_vale = parseFloat(get_passed) + 3.7;
                                    $("#warning").css("width", add_vale + "%");
                                    $("#img_err").attr("class", "fa fa-exclamation-circle");
                                    $("#img_color").css('color','#ff6600');
                                    
                                }
                            }
                            catch(err) {
                                $("#js_minified").append("JS is minified");
                                var get_passed = document.getElementById("passed_progress").style.width;
                                var add_vale = parseFloat(get_passed) + 3.7;
                                $("#passed_progress").css("width", add_vale + "%");
                            }

                            try {
                                var wastBytes_js = lighthouse.audits['uses-text-compression']['details']['items'][1]['wastedBytes'];
                                if(wastBytes_js){
                                    $("#gzip_compression").append("Your page is not being GZIP compressed. This can impact how quickly your page takes to load");
                                    var get_passed = document.getElementById("warning").style.width;
                                    var add_vale = parseFloat(get_passed) + 3.7;
                                    $("#warning").css("width", add_vale + "%");
                                    $("#img_gzip").attr("class", "fa fa-exclamation-circle");
                                    $("#gzip_color").css('color','#ff6600');
                                }
                            }
                            catch(err) {
                                $("#gzip_compression").append("GZIP is enabled");
                                var get_passed = document.getElementById("passed_progress").style.width;
                                var add_vale = parseFloat(get_passed) + 3.7;
                                $("#passed_progress").css("width", add_vale + "%");
                                $("#img_gzip").attr("class", "fa fa-check");
                            }
                            //$('.circle').attr('data-percent', score);
                            // animateElements();
                            //$(window).scroll(animateElements);
                            $('#progressBar').css('width', 100 + '%').text(100 + '%');
                            $(".progress-bar1").css("animation-play-state", "paused");
                            $('#waiting').hide();
                        });
                }

                function isUrl(s) {
                    var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
                            return regexp.test(s);
                    }

                });

        </script>


</div>

@endsection
