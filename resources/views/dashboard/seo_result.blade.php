    <div class="row audit-text pt-3 pb-3">
        <div class="col-md-5">
            <h5 id="url"><STRONG>SEO Analysis:</STRONG> {{$url}}</h5>
        </div>
        <div class="col-md-2">

        </div>
        <div class="col-md-5 text-right">
            <h5>{{$time}}</h5>
        </div>
    </div>
    
    <section id="analysis" class="analysis-page">
        <div class="row Analysis-details" style="border:1px solid #f4f4f4;padding: 6px;">
                  <div class="col-md-4 score-box">
                     <h4>Page SEO Score</h4>
                <div class="blue text-center">
                    <div class="score-wrapper">
                    <div class="Progress" id="score" data-animate="false">
                        <div class="circle" data-percent="58">
                            <div></div>
                        </div>
                    </div>
                    </div>
                </div>
                <h3 style="text-align:center">{{$score_description ?? ''}}</h3>
            </div>
            <div class="col-md-4">
                <!-- <img src="images/desktop.jpg" style="height:140px;margin-top:15%;margin-left:5%;"> -->
                <div class="screen-container">
                    <div class="screen monitor">
                        <div class="content">
                        <img src="images/screenshot.png" style="width:100%" />
                       
                        </div>
                        <div class="basee">
                            <div class="grey-shadow"></div>
                            <div class="foot top"></div>
                            <div class="foot bottom"></div>
                            <div class="shadow"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 breakdown">
<!--                 <h5 class="meta"><a href="{{$url}}">{{$url}} <i class="fa fa-external-link" aria-hidden="true"></i></a></h5> -->
                
                <h6 class="pass">
                    <i class="fa fa-check" style="color:#008000" aria-hidden="true"></i> Passed
                </h6>
                <div class="progress" style="margin-bottom:5px;width: 70%;float: left;">
                        <div id="passed_progress" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="10"
                        aria-valuemin="0" aria-valuemax="100" style="width:{{ $passed_score ?? ''}}%;background-color: #008000;">
                        </div>
                </div>
                <div class="clear"></div>
                 <h6 class="mca">
                    <i style="color:#ff0000" class="fa fa-exclamation-triangle" aria-hidden="true"></i> Errors
                </h6>
                <div class="progress" style="margin-bottom:5px;width: 70%;float: left;">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60"
                        aria-valuemin="0" aria-valuemax="100" style="width:{{$error_score ?? ''}}%;background-color: #ff0000;">
                        </div>
                </div>
                <div class="clear"></div>
                <h6 class="cta">
                    <i style="color:#ff6600" class="fa fa-exclamation-circle" aria-hidden="true"></i> Warnings
                </h6>
                <div class="progress" style="margin-bottom:5px;width: 70%;float: left;">
                        <div id="warning" class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50"
                        aria-valuemin="0" aria-valuemax="100" style="width:{{$warning_score ?? ''}}%;background-color: #ff6600;">
                        </div>
                </div>
                <div class="clear"></div>
                <h6 class="pta">
                    <i style="color:#0E6EEA" class="fa fa-flag" aria-hidden="true"></i> Notices
                </h6>
                <div class="progress" style="margin-bottom:5px;width: 70%;float: left;">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70"
                        aria-valuemin="0" aria-valuemax="100" style="width:{{$notice_score ?? ''}}%;background-color: #0E6EEA;">
                        </div>
                </div>
                <div class="clear"></div>
                <div class="row export-tools" style="display:none;">
                        <div class="col-md-6">
                            <a class="btn btn-success" href="#">EMAIL</a>
                        </div>
                          <div class="col-md-6">
                            <a class="btn btn-success" href="#">DOWNLOAD</a>
                        </div>
                </div>
                <p class="overview-desc" style="display:none">On this scan, {{ $passed_score ?? ''}} factors passed with {{$error_score ?? ''}} errors, {{$warning_score ?? ''}} warnings and {{$notice_score ?? ''}} notices. Errors are the most important to fix in order to rank higher in search engines.</p>
            </div>
      
        </div>
    </section>

    <section id='header'>
        <h2 style="margin-bottom: 30px;margin-top: 30px;">Header</h2>
        <div class="heading-section">

            <div class="row">
                <div class="col-md-3">
                @if($title_length > 30 && $title_length < 70)
                    <h6><span style="margin-right: 9px;color: green;"><i class="fa fa-check" aria-hidden="true"></i></span>Title Tag</h6>
                @elseif($title_length <= 30)
                    <h6><span style="margin-right: 9px;color: #ff0000;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>Title Tag</h6>
                @elseif($title_length > 60)
                    <h6><span style="margin-right: 9px;color: #ff0000;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>Title Tag</h6>
                @endif
                </div>
                <div class="col-md-9">
                    <p>{{$title}}</p>
                    <p>Length: {{$title_length}} Characters (Recommended: 60 characters)</p>
                </div>
            </div>
                <hr>
            <div class="row">
                <div class="col-md-3">
                @if($meta_length > 60 && $meta_length < 160)

                    <h6><span style="margin-right: 9px;color: green;"><i class="fa fa-check" aria-hidden="true"></i></span>Meta Description Tag</h6>
                @else
                <h6><span style="margin-right: 9px;color: #ff0000;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>Meta Description Tag</h6>
                @endif
                </div>
                <div class="col-md-9">
                    <p>{{$meta}}</p>
                    <p>Length: {{$meta_length}} Characters (Recommended: 60-160 characters)</p>
                </div>
            </div>
                <hr>
            <div class="row">
                <div class="col-md-3">
                    @if(!empty($canonical))
                        <h6><span style="margin-right: 9px;color: green;"><i class="fa fa-check" aria-hidden="true"></i></span>Canonical Tag</h6>
                    @else
                        <h6><span style="margin-right: 9px;color: #ff6600;"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>Canonical Tag</h6>
                    @endif
                </div>
                <div class="col-md-9">
                    <p>{{$canonical ?? 'Your canonical tag is missing. Canonical tags are important because they tell search engines what the correct URL of the page should be.'}}</p>
                </div>
            </div>
                <hr>
            <div class="row">
                <div class="col-md-3">
                    <h6><i style="color:#999" class="fa fa-google" aria-hidden="true"></i> Google Preview</h6>
                </div>
                <div class="col-md-9">
                    <div class="google-preview">
                    <h5 style="color:#1a0dab;">{{$title}}</h5>
                    <h6 style="font-size:14px;color:green;">{{$url}}</h6>
                    <p>{{$meta}}</p>
                </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    @if(!empty($favicon))
                        <h6><span style="margin-right: 9px;color: green;"><i class="fa fa-check" aria-hidden="true"></i></span>Favicon</h6>
                    @else
                        <h6><span style="margin-right: 9px;color: #0E6EEA;"><i class="fa fa-flag" aria-hidden="true"></i></span>Favicon</h6>
                    @endif
                </div>
                <div class="col-md-9 favicon">
                    @if(!empty($favicon))
                       <img src="{{$favicon}}" alt="" class="fav-icon"> <p class="fav">Your site using favicon</p>
                    @else
                        <p>Your site is missing it's favicon. Favicons are important for brand visability and SEO.</p>
                    @endif
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    @if($mobile_friendly === 'MOBILE_FRIENDLY')
                        <h6><span style="margin-right: 9px;color: green;"><i class="fa fa-check" aria-hidden="true"></i></span>Mobile Friendly</h6>
                    @elseif($mobile_friendly === 'NOT_MOBILE_FRIENDLY')
                        <h6><span style="margin-right: 9px;color: #ff6600;"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>Mobile Friendly</h6>
                    @endif
                </div>
                <div class="col-md-9">
                    @if($mobile_friendly === 'MOBILE_FRIENDLY')
                        <p>Your website is Mobile Friendly</p>
                    @elseif($mobile_friendly === 'NOT_MOBILE_FRIENDLY')
                        <p>Your website is not mobile responsive. With a mobile responsive website, you will rank better in the mobile index.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section id='technical'>
        <h2 style="margin-bottom: 30px;margin-top: 30px;">Technical</h2>
        <div class="Technical-section">

            <div class="row">
                <div class="col-md-3">
                    @if(!empty($schema))
                        <h6><span style="margin-right: 9px;color: green;"><i class="fa fa-check" aria-hidden="true"></i></span>Schema Tags</h6>
                    @else
                        <h6><span style="margin-right: 9px;color:#0E6EEA;"><i class="fa fa-flag" aria-hidden="true"></i></span>Schema Tags</h6>
                    @endif
                </div>
                <div class="col-md-9">
                    @if(!empty($schema))
                        <p>Schema tags found on your page</p>
                    @else
                        <p>Your page is missing schema tags. Schema tags help crawlers determine certain information about a website, business, products or videos. </p>
                    @endif
                    <!-- <h6>Organisation, Service</h6>
                    <p>No Schema Errors</p> -->
                </div>
            </div>
                <hr>
            <div class="row">
                <div class="col-md-3">
                @if(empty($img_miss_alt))
                <h6><span style="margin-right: 9px;color: green;"><i class="fa fa-check" aria-hidden="true"></i></span>Alt Tags</h6>
                @else
                <h6><span style="margin-right: 9px;color: #ff6600;"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>Alt Tags</h6>
                @endif

                </div>
                <div class="col-md-9">
                    @if(empty($img_miss_alt))
                        <p>No images are missing alt tags. ({{$img_alt ?? 0}} images passed)</p>
                    @else
                        <p>{{$img_miss_alt}} images are missing alt tags. ({{$img_alt}} images passed)</p>
                    @endif

                    @if(!empty($img_without_alt))
                        @foreach($img_without_alt as $alt)
                        <p style="margin-bottom: 0;">{{$alt}}</p>
                    @endforeach
                    @else
                    
                    @endif

                </div>
            </div>
                <hr>
            <div class="row">
                <div class="col-md-3">
                    @if($url_seo_friendly == "SEO-Friendly")
                        <h6><span style="margin-right: 9px;color: green;"><i class="fa fa-check" aria-hidden="true"></i></span>SEO Friendly URL</h6>
                    @elseif($url_seo_friendly == "Unfriendly SEO URLs")
                        <h6><span style="margin-right: 9px;color: #ff0000;"><i class="fa fa-times" aria-hidden="true"></i></span>SEO Friendly URL</h6>
                    @endif
                </div>
                <div class="col-md-9">
                    <p>{{$url}}  {{$url_seo_friendly}}</p>
                </div>
            </div>
                <hr>
            <div class="row">
                <div class="col-md-3">
                @if(!empty($iframe))
                    <h6><span style="margin-right: 9px;color: #ff0000;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>Flash/Iframes</h6>
                @else
                    <h6><span style="margin-right: 9px;color: green;"><i class="fa fa-check" aria-hidden="true"></i></span>Flash/Iframes</h6>
                @endif
                </div>
                <div class="col-md-9">
               @if(!empty($iframe))
                    <p>You are using an Iframe on your page. Iframes can't be crawled by search engines and aren't good for SEO, in general.</p>
                @else
                  <p>No Iframes on the page</p>
                @endif
                </div>
            </div>
            </div>
        </div>
    </section>

    <section id='Content'>
        <h2 style="margin-bottom: 30px;margin-top: 30px;">Content</h2>
        <div class="Technical-section">
            <div class="row">
                <div class="col-md-3">
                    @if($h1_tags > 0)
                        <h6><span style="margin-right: 9px;color: green;"><i class="fa fa-check" aria-hidden="true"></i></span>H1 tag</h6>
                    @else
                        <h6><span style="margin-right: 9px;color: #ff6600;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>H1 tags</h6>
                    @endif
                </div>
                <div class="col-md-9">
                     {{$h1_tags}} H1 tags were found on your page
                    <ol>
                    @foreach($h1 as $val)
                      <li>{{$val}}</li>
                    @endforeach
                    </ol>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    @if($h2_tags > 0)
                        <h6><span style="margin-right: 9px;color: green;"><i class="fa fa-check" aria-hidden="true"></i></span>H2 tags</h6>
                    @else
                        <h6><span style="margin-right: 9px;color: #ff0000;"><i class="fa fa-exclamation-triange" aria-hidden="true"></i></span>H2 tags</h6>
                    @endif
                </div>
                <div class="col-md-9">
                    {{$h2_tags}} H2 tags were found on your page
                    <ol>
                    @foreach($h2 as $val)
                        <li>{{$val}}</li>
                    @endforeach
                    </ol>

                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    @if($h3_tags > 0)
                        <h6><span style="margin-right: 9px;color: green;"><i class="fa fa-check" aria-hidden="true"></i></span>H3 tags</h6>
                    @else
                        <h6><span style="margin-right: 9px;color: #ff0000;"><i class="fa fa-exclamation-triange" aria-hidden="true"></i></span>H3 tags</h6>
                    @endif
                </div>
                <div class="col-md-9">
                    {{$h3_tags}} H3 tags were found on your page
                    <ol>
                    @foreach($h3 as $val)
                      <li>{{$val}}</li>
                    @endforeach
                    </ol>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    @if(!empty($word_count))
                        <h6><span style="margin-right: 9px;color: green;"><i class="fa fa-check" aria-hidden="true"></i></span>Keyword Density</h6>
                    @else
                        <h6><span style="margin-right: 9px;color: #ff6600;"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>Keyword Density </h6>
                    @endif
                </div>
                <div class="col-md-9">
                    @if(!empty($word_count))
                        <table class="table keyword-table">
                            <thead class="thead-light">
                                <tr>
                                    <th>Keyword</th>
                                    <th>SHOWN</th>
                                    <th>DENSiTY</th>
                                    <th>TITLE</th>
                                    <th>DESC</th>
                                    <th>H1</th>
                                    <th>H2</th>
                                    <th>H3</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;?>
                                    @foreach ($word_count as $key => $val)
                                        @if($i < 11 && strlen($key)>3)
                                            <tr>
                                                <th>{{$key}}</th>
                                                <td>{{$val}}</td>
                                                <td>{{number_format(($val / $page_words) * 100)}}%</td>
                                                @if(stripos($title, $key) !== false)
                                                    <td style="color:green;"><i class="fa fa-check" aria-hidden="true"></i></td>
                                                @else
                                                <td style="color:red;"><i class="fa fa-times" aria-hidden="true"></i></td>
                                                @endif
                                                @if(stripos($meta, $key) !== false)
                                                    <td style="color:green;"><i class="fa fa-check" aria-hidden="true"></i></td>
                                                @else
                                                <td style="color:red;"><i class="fa fa-times" aria-hidden="true"></i></td>
                                                @endif
                                                @if(stripos(implode("",$h1), $key) !== false)
                                                    <td style="color:green;"><i class="fa fa-check" aria-hidden="true"></i></td>
                                                @else
                                                <td style="color:red;"><i class="fa fa-times" aria-hidden="true"></i></td>
                                                @endif
                                                @if(stripos(implode("",$h2), $key) !== false)
                                                    <td style="color:green;"><i class="fa fa-check" aria-hidden="true"></i></td>
                                                @else
                                                <td style="color:red;"><i class="fa fa-times" aria-hidden="true"></i></td>
                                                @endif
                                                @if(stripos(implode("",$h3), $key) !== false)
                                                    <td style="color:green;"><i class="fa fa-check" aria-hidden="true"></i></td>
                                                @else
                                                <td style="color:red;"><i class="fa fa-times" aria-hidden="true"></i></td>
                                                @endif
                                            </tr>
                                            @endif
                                    <?php $i++;?>
                                    @endforeach
                            </tbody>
                        </table>
                        @else
                            {{$density_message}}
                        @endif
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    @if($page_words < 300)
                        <h6><span style="margin-right: 9px;color: #ff6600;"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>Thin Content</h6>
                    @else
                        <h6><span style="margin-right: 9px;color: green;"><i class="fa fa-check" aria-hidden="true"></i></span>Thin Content</h6>
                    @endif
                </div>
                <div class="col-md-9">
                        Page contain {{$page_words}} words
                    </p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                @if($page_text_ratio > 10)
                    <h6><span style="margin-right: 9px;color: green;"><i class="fa fa-check" aria-hidden="true"></i></span>Text-HTML ratio</h6>
                @else
                    <h6><span style="margin-right: 9px;color: #ff6600;"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>Text-HTML ratio</h6>
                @endif
                </div>
                <div class="col-md-9">
                    <table class="table size-table">
                        <thead class="thead-light">
                            <tr>
                            <th>Page Size</th>
                            <th>Text Size</th>
                            <th>Text-HTML Ratio(%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{number_format($page_size,'1')}} Kb</td>
                                <td>{{number_format($page_words_size,'1')}} kb</td>
                                <td>{{number_format($page_text_ratio,'1')}} %</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <section id='performance'>
        <h2 style="margin-bottom: 30px;margin-top: 30px;">Performance</h2>
        <div class="Technical-section">
            <div class="row">
                <div class="col-md-3">
                    <h6><span style="margin-right: 9px;color: green;"><i class="fa fa-check" aria-hidden="true"></i></span>HTTP Request & Content Breakdown</h6>
                </div>
                <div class="col-md-9">
                    @foreach($http as $https)
                        {{$https}} <br>
                    @endforeach
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <h6><span style="margin-right: 9px;color: green;" id="img_color"><i class="fa fa-check" aria-hidden="true" id="img_err"></i></span>JS/CSS Minification</h6>
                </div>
                <div class="col-md-9">
                    <p id='css_minified'></p>
                    <p id='js_minified'></p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    @if(!empty($img_data))
                        <h6><span style="margin-right: 9px;color: green;"><i class="fa fa-check" aria-hidden="true"></i></span>Image Size Analysis </h6>
                    @else
                        <h6><span style="margin-right: 9px;color:#0E6EEA;"><i class="fa fa-flag" aria-hidden="true"></i></span>Image Size Analysis </h6>
                    @endif    
                </div>
                <div class="col-md-9">
                    @if(!empty($img_data))
                        <table class="table image-table">
                            <thead class="thead-light">
                                <tr>
                                <th>Image Location</th>
                                <th>Size</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($img_data as  $key => $val)
                                    <tr>
                                        <td><a target="_blank" href="{{substr($key,0,80)}}">{{substr($key,0,80)}}  <i class="fa fa-external-link" aria-hidden="true"></i></a></td>
                                        <td>{{number_format($val,1)}} kb</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            </table>
                    @else
                        <p>Error Found</p>
                    @endif
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    
                    <h6><span style="margin-right: 9px;color: green;" id="gzip_color"><i class="fa fa-check" aria-hidden="true" id="img_gzip"></i></span>GZIP Compression</h6>
                </div>
                <div class="col-md-9">
                    <p id='gzip_compression'></p>
                </div>
            </div>
             <hr>
            <div class="row">
                <div class="col-md-3">
                    @if(!empty($cache))
                        <h6><span style="margin-right: 9px;color: green;"><i class="fa fa-check" aria-hidden="true"></i></span>Browser Caching</h6>
                    @else
                        <h6><span style="margin-right: 9px;color: #ff6600;"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>Browser Caching</h6>
                    @endif
                </div>
                <div class="col-md-9">
                   @if(!empty($cache))
                        <p>Cache found on your page</p>
                   @else
                        <p>Cache not found on your page</p>
                   @endif
                </div>
            </div>
        </div>
    </section>

    <section id='links'>
        <h2 style="margin-bottom: 30px;margin-top: 30px;">Links</h2>
        <div class="Technical-section">
            <div class="row">
                <div class="col-md-3">
                @if(!empty($internal_link))
                    <h6><span style="margin-right: 9px;color: green;"><i class="fa fa-check" aria-hidden="true"></i></span>Internal Linking</h6>
                @else
                    <h6><span style="margin-right: 9px;color: #ff6600;"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>Internal Linking</h6>
                @endif
                </div>
                <div class="col-md-9">
                    @if(!empty($internal_link))
                        <p>Internal Links found</p>
                    @else
                        <p>Internal Links not found</p>
                    @endif
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <h6><span style="margin-right: 9px;color: green;"><i class="fa fa-check" aria-hidden="true"></i></span>Referring Domains</h6>
                </div>
                <div class="col-md-9">

                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <h6><span style="margin-right: 9px;color: green;"><i class="fa fa-check" aria-hidden="true"></i></span>Referring URLs </h6>
                </div>
                <div class="col-md-9">
                    
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    @if(!empty($status404))
                        <h6><span style="margin-right: 9px;color: red;"><i class="fa fa-times" aria-hidden="true"></i></span>Broken Links</h6>
                    @else
                        <h6><span style="margin-right: 9px;color: green;"><i class="fa fa-check" aria-hidden="true"></i></span>Broken Links</h6>
                    @endif
                </div>
                <div class="col-md-9">
                    @if(!empty($status404))
                        <p>You have broken links on your page. Those links are sending users to a page that does not exist.</p>
                    @else
                        <p>No broken links found</p>
                    @endif
                </div>
            </div>
        </div>
    </section>

     <section id='security'>
        <h2 style="margin-bottom: 30px;margin-top: 30px;">Security</h2>
        <div class="Technical-section">
            <div class="row">
                <div class="col-md-3">
                    @if($page_https == "Page using HTTPS")
                        <h6><span style="margin-right: 9px;color: green;"><i class="fa fa-check" aria-hidden="true"></i></span>HTTPS</h6>
                    @else
                        <h6><span style="margin-right: 9px;color: red;"><i class="fa fa-times" aria-hidden="true"></i></span>HTTPS</h6>
                    @endif
                </div>
                <div class="col-md-9">
                   @if(!empty($page_https))
                        <p>{{$page_https}}</p><br>
                    @endif    
                    
                </div>
            </div>
             <hr>
                 <div class="row">
                <div class="col-md-3">
                    @if(!empty($ssl_certificate))
                        <h6><span style="margin-right: 9px;color: green;"><i class="fa fa-check" aria-hidden="true"></i></span>SSL Certificate</h6>
                    @else
                        <h6><span style="margin-right: 9px;color: red;"><i class="fa fa-times" aria-hidden="true"></i></span>SSL Certificate</h6>
                    @endif
                </div>
                <div class="col-md-9">
                  @if(!empty($ssl_certificate))
                        <p>SSL certificate found</p>
                    @else
                        <p>SSL certificate not found</p>
                    @endif
                     
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    @if(!empty($a_https) && !empty($link_https) && !empty($script_https))
                        <h6><span style="margin-right: 9px;color: red;"><i class="fa fa-times" aria-hidden="true"></i></span>Mixed Content Issues</h6>
                    @else
                        <h6><span style="margin-right: 9px;color: green;"><i class="fa fa-check" aria-hidden="true"></i></span>Mixed Content Issues</h6>
                    @endif
                </div>
                <div class="col-md-9">
                    @if(!empty($a_https) && !empty($link_https)  && !empty($script_https))
                        <p>Links pointing to non-https pages found</p>
                    @else
                        <p>Links pointing to non-https pages not found</p>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section id='social'>
        <h2 style="margin-bottom: 30px;margin-top: 30px;">Social</h2>
        <div class="Technical-section">
            <div class="row">
                <div class="col-md-3">
                    @if(!empty($social_media_link))
                        <h6><span style="margin-right: 9px;color: green;"><i class="fa fa-check" aria-hidden="true"></i></span>Links to Social Media Pages</h6>
                    @else
                        <h6><span style="margin-right: 9px;color:#0E6EEA;"><i class="fa fa-flag" aria-hidden="true"></i></span>Links to Social Media Pages</h6>
                    @endif
                </div>
                <div class="col-md-9">
                    <p>{{$social_media_link ?? 'Link to social media profiles not found'}}</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    @if(!empty($social_schema))
                        <h6><span style="margin-right: 9px;color: green;"><i class="fa fa-check" aria-hidden="true"></i></span>Social Schema Tags</h6>
                    @else
                    <h6><span style="margin-right: 9px;color:#0E6EEA;"><i class="fa fa-flag" aria-hidden="true"></i></span>Social Schema Tags</h6>
                    @endif
                </div>
                <div class="col-md-9">
                    @if(!empty($social_schema))
                        <p>Schema tags for social media profiles found</p>
                    @else
                    <p>Schema tags for social media profiles not found</p>
                    @endif
                </div>
            </div>

        </div>
    </section>
    
    <section id='other'>
        <h2 style="margin-bottom: 30px;margin-top: 30px;">Other</h2>
        <div class="Technical-section">
            <div class="row">
                <div class="col-md-3">
                    @if(!empty($robot) && $robot[0] !== '<!doctype')
                        <h6><span style="margin-right: 9px;color: green;"><i class="fa fa-check" aria-hidden="true"></i></span>Robots.txt</h6>
                    @else
                        <h6><span style="margin-right: 9px;color:#0E6EEA;"><i class="fa fa-flag" aria-hidden="true"></i></span>Robots.txt</h6>
                    @endif
                </div>
                <div class="col-md-9">
                    @if(!empty($robot) && $robot[0] !== '<!doctype')
                        <p>Robots.txt file found</p>
                    @else
                        <p>Your site is missing its robots.txt file. This file tells search engine bots how to most appropriately crawl your site and which pages not to crawl and index.</p>
                    @endif

                </div>
            </div>
            <hr>
            <div class="clear">
                
            </div>
            <div class="sectionmap"> 
            <div class="row">
                <div class="col-md-3">
                    @if(!empty($sitemap))
                        <h6><span style="margin-right: 9px;color: green;"><i class="fa fa-check" aria-hidden="true"></i></span>XML Sitemap</h6>
                    @else
                        <h6><span style="margin-right: 9px;color: #ff6600;"><i class="fa fa fa-exclamation-circle" aria-hidden="true"></i></span>XML Sitemap</h6>
                    @endif
                </div>
                <div class="col-md-9">
                    @if(!empty($sitemap))
                        <p>XML sitemap found</p>
                    @else
                        <p>We cannot seem to find your website's sitemap.xml file. This helps search engines better index your website and get found online.</p>
                    @endif
                </div>
            </div>
            </div>
         </div>

    </section>
