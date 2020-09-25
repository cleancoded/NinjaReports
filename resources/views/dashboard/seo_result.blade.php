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
    <section id="analysis">
        <div class="row Analysis-details" style="border:1px solid #f4f4f4;padding: 6px;">
            <div class="col-md-2">
                <img src="images/desktop.jpg" style="height:140px;margin-top:15%;margin-left:5%;">
            </div>
            <div class="col-md-6" style="padding-top: 1%;padding-left: 5%;">
                <h5><a href="#">{{$url}}</a></h5>
                <h6 style="width: 17%;float: left;margin-right: 20px;">
                    <span><img src="images/green.png"></span>
                    Passed
                </h6>
                <div class="progress" style="margin-bottom:5px;width: 70%;float: left;">
                        <div id="passed_progress" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="10"
                        aria-valuemin="0" aria-valuemax="100" style="width:{{ $passed_score ?? ''}}%;background-color: green;">
                        </div>
                </div>
                <div class="clear"></div>
                <h6 style="width: 17%;float: left;margin-right: 20px;">
                    <span><img src="images/orange.png"></span>
                    Warning
                </h6>
                <div class="progress" style="margin-bottom:5px;width: 70%;float: left;">
                        <div id="warning" class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50"
                        aria-valuemin="0" aria-valuemax="100" style="width:{{$warning_score ?? ''}}%;background-color: orange;">
                        </div>
                </div>
                <div class="clear"></div>
                <h6 style="width: 17%;float: left;margin-right: 20px;">
                    <span><img src="images/red.png"></span>
                    Errors
                </h6>
                <div class="progress" style="margin-bottom:5px;width: 70%;float: left;">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60"
                        aria-valuemin="0" aria-valuemax="100" style="width:{{$error_score ?? ''}}%;background-color: red;">
                        </div>
                </div>
                <div class="clear"></div>
                <h6 style="width: 17%;float: left;margin-right: 20px;">
                    <span><img src="images/blue.jpg"></span>
                    Notices
                </h6>
                <div class="progress" style="margin-bottom:5px;width: 70%;float: left;">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70"
                        aria-valuemin="0" aria-valuemax="100" style="width:%;background-color: blue;">
                        </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="col-md-4"  style="margin-bottom:5px;">
                <div class="blue" style="margin-left: 12%;">
                    <div class="Progress" id="score" data-animate="false">
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
                @if($title_length > 30 && $title_length < 70)
                    <h6><span><img src="images/green.png"></span>Title Tag</h6>
                @elseif($title_length <= 30)
                    <h6><span><img src="images/orange.png"></span>Title Tag</h6>
                @elseif($title_length > 60)
                    <h6><span><img src="images/orange.png"></span>Title Tag</h6>
                @endif
                </div>
                <div class="col-md-9">
                    <h6>{{$title}}</h6>
                    <p>Length: {{$title_length}} Characters (recommended: 60 characters)</p>
                </div>
            </div>
                <hr>
            <div class="row">
                <div class="col-md-3">
                @if($meta_length > 50 && $meta_length < 160)

                    <h6><span><img src="images/green.png"></span>Meta Description</h6>
                @else
                <h6><span><img src="images/orange.png"></span>Meta Description</h6>
                @endif
                </div>
                <div class="col-md-9">
                    <p>{{$meta}}</p>
                    <p>Length: {{$meta_length}} Characters (recommended: 60 to 160 characters)</p>
                </div>
            </div>
                <hr>
            <div class="row">
                <div class="col-md-3">
                    @if(!empty($canonical))
                        <h6><span><img src="images/green.png"></span>Canonical</h6>
                    @else
                        <h6><span><img src="images/orange.png"></span>Canonical</h6>
                    @endif
                </div>
                <div class="col-md-9">
                    <p>{{$canonical ?? 'No canonical URL on Page'}}</p>
                </div>
            </div>
                <hr>
            <div class="row">
                <div class="col-md-3">
                    <h6><span><img src="images/gray.jpg"></span>Google Preview</h6>
                </div>
                <div class="col-md-9">
                    <h5 style="color:#1a0dab;">{{$title}}</h5>
                    <h6 style="font-size:14px;color:green;">{{$url}}</h6>
                    <p>{{$meta}}</p>
                </div>
            </div>
        </div>
    </section>

    <section id='technical'>
        <h2 style="margin-bottom: 30px;margin-top: 30px;">Technical</h2>
        <div class="Technical-section">

            <div class="row">
                <div class="col-md-3">
                    @if(!empty($schema_tags))
                        <h6><span><img src="images/green.png"></span>Schema Tags</h6>
                    @else


                        <h6><span><img src="images/orange.png"></span>Schema Tags</h6>
                    @endif
                </div>
                <div class="col-md-9">
                    @if(!empty($schema_tags))
                        <p>Schema tags found on your page</p>
                    @else
                        <p>Schema tags not found on your page</p>
                    @endif
                    <!-- <h6>Organisation, Service</h6>
                    <p>No Schema Errors</p> -->
                </div>
            </div>
                <hr>
            <div class="row">
                <div class="col-md-3">
                @if(empty($img_miss_alt))
                <h6><span><img src="images/green.png"></span>Alt Tags</h6>
                @else
                <h6><span><img src="images/orange.png"></span>Alt Tags</h6>
                @endif

                </div>
                <div class="col-md-9">
                    @if(empty($img_miss_alt))
                        <p>No images are missing alt tags.({{$img_alt ?? 0}} images passed)</p>
                    @else
                        <p>{{$img_miss_alt}} images are missing alt tags.({{$img_alt}} images passed)</p>
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
                    @if($url_seo_friendly == "Seo Friendly")
                        <h6><span><img src="images/green.png"></span>SEO Friendly URL</h6>
                    @elseif($url_seo_friendly == "not seo friendly")
                        <h6><span><img src="images/red.png"></span>SEO Friendly URL</h6>
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
                    <h6><span><img src="images/orange.png"></span>Flash/Iframes</h6>
                @else
                    <h6><span><img src="images/green.png"></span>Flash/Iframes</h6>
                @endif
                </div>
                <div class="col-md-9">
               @if(!empty($iframe))
                    <p>You are using an Iframe on your page.Iframes can't be crawled by search engnies and aren't good for SEO, in General</p>
                @else
                  <p>No Iframe on Page</p>
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
                        <h6><span><img src="images/green.png"></span>H1</h6>
                    @else
                        <h6><span><img src="images/orange.png"></span>H1</h6>
                    @endif
                </div>
                <div class="col-md-9">
                     {{$h1_tags}} H1 tags were found on your page
                    <p>
                    @foreach($h1 as $val)
                        {{$val}} <br>
                    @endforeach
                    </p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    @if($h2_tags > 0)
                        <h6><span><img src="images/green.png"></span>H2</h6>
                    @else
                        <h6><span><img src="images/orange.png"></span>H2</h6>
                    @endif
                </div>
                <div class="col-md-9">
                    {{$h2_tags}} H2 tags were found on your page
                    <p>
                    @foreach($h2 as $val)
                        {{$val}} <br>
                    @endforeach
                    </p>

                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    @if($h3_tags > 0)
                        <h6><span><img src="images/green.png"></span>H3</h6>
                    @else
                        <h6><span><img src="images/orange.png"></span>H3</h6>
                    @endif
                </div>
                <div class="col-md-9">
                    {{$h3_tags}} H3 tags were found on your page
                    <p>
                    @foreach($h3 as $val)
                        {{$val}} <br>
                    @endforeach
                    </p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    @if(!empty($word_count))
                        <h6><span><img src="images/green.png"></span>Keyword Density </h6>
                    @else
                        <h6><span><img src="images/orange.png"></span>Keyword Density </h6>
                    @endif
                </div>
                <div class="col-md-9">
                    @if(!empty($word_count))
                        <table class="table">
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
                                        @if($i < 11)
                                            <tr>
                                                <th>{{$key}}</th>
                                                <td>{{$val}}</td>
                                                <td>{{number_format(($val / $numWords) * 100)}}%</td>
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
                    @if($page_words)
                        <h6><span><img src="images/green.png"></span>Thin Content</h6>
                    @else
                        <h6><span><img src="images/orange.png"></span>Thin Content</h6>
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
                    <h6><span><img src="images/green.png"></span>Text-HTML ratio</h6>
                </div>
                <div class="col-md-9">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                            <th>Page Size</th>
                            <th>Text Size</th>
                            <th>Code To Text Ratio(%)</th>
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
                    <h6><span><img src="images/green.png"></span>HTTP Request & Content Breakdown</h6>
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
                    <h6><span><img src="images/green.png"></span>JS/CSS Minification</h6>
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
                        <h6><span><img src="images/green.png"></span>Image Size Analysis </h6>
                    @else
                        <h6><span><img src="images/red.png"></span>Image Size Analysis </h6>
                    @endif    
                </div>
                <div class="col-md-9">
                    @if(!empty($img_data))
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                <th>Location</th>
                                <th>Size</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($img_data as  $key => $val)
                                    <tr>
                                        <td>{{substr($key,0,80)}}</td>
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
                    <h6><span><img src="images/green.png"></span>GZIP Compression</h6>
                </div>
                <div class="col-md-9">
                    <p id='gzip_compression'></p>
                </div>
            </div>
             <hr>
            <div class="row">
                <div class="col-md-3">
                    @if(!empty($cache))
                        <h6><span><img src="images/green.png"></span>Browser Cacheing</h6>
                    @else
                        <h6><span><img src="images/orange.png"></span>Browser Cacheing</h6>
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
                    <h6><span><img src="images/green.png"></span>Internal Linking</h6>
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
                    <h6><span><img src="images/green.png"></span>Referring Domains</h6>
                </div>
                <div class="col-md-9">

                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <h6><span><img src="images/green.png"></span>Referring URLs </h6>
                </div>
                <div class="col-md-9">
                    
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    @if(!empty($status404))
                        <h6><span><img src="images/red.png"></span>Broken Links</h6>
                    @else
                        <h6><span><img src="images/green.png"></span>Broken Links</h6>
                    @endif
                </div>
                <div class="col-md-9">
                    @if(!empty($status404))
                        <p>Broken links found</p>
                    @else
                        <p>No Broken link found</p>
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
                    @if($page_https == "Page use HTTPS")
                        <h6><span><img src="images/green.png"></span>HTTPS</h6>
                    @else
                        <h6><span><img src="images/red.png"></span>HTTPS</h6>
                    @endif
                </div>
                <div class="col-md-9">
                   @if(!empty($page_https))
                        <p>{{$page_https}}</p><br>
                        <h5>SSL Certificate</h5>
                        <div style="display:flex;">
                            <h6>Issuer :</h6><p style="margin-left: 107px;">{{$ssl_issuer ?? 'Not Found'}}</p>
                        </div>
                        <div style="display:flex;">
                            <h6>Common Name :</h6><p style="margin-left: 35px;">{{$com_name ?? 'Not Found'}} </p>
                        </div>
                        <div style="display:flex;">
                            <h6>Alternative Names:</h6> <p style="margin-left: 78px;">{{str_replace('DNS:', '', $alt_name) ?? 'Not Found'}}</p>
                        </div>
                        <div style="display:flex;">
                            <h6>Valid From :</h6><p style="margin-left: 72px;">{{$date_formate_from ?? 'Not Found'}}</p>
                        </div>
                        <div style="display:flex;">
                            <h6>Valid To :</h6><p style="margin-left: 93px;">{{$date_formate_to ?? 'Not Found'}}</p>
                        </div>
                        <div style="display:flex;">
                            <h6>Signature Algorithm:</h6><p style="margin-left: 8px;">{{$ssl_signature ?? 'Not Found'}}</p>
                        </div>
                   @endif
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">

                        @if($a_https !== null && $link_https !== null && $script_https !== null )
                            <h6><span><img src="images/red.png"></span>Mixed Content Issues</h6>
                        @else
                            <h6><span><img src="images/green.png"></span>Mixed Content Issues</h6>
                        @endif

                </div>
                <div class="col-md-9">
                    @if($a_https !== null && $link_https !== null && $script_https !== null )
                        <p>links pointing to non-https pages found</p>
                    @else
                        <p>links pointing to non-https pages not found</p>
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
                        <h6><span><img src="images/green.png"></span>Links to Social Media Pages</h6>
                    @else
                        <h6><span><img src="images/orange.png"></span>Links to Social Media Pages</h6>
                    @endif
                </div>
                <div class="col-md-9">
                    <p>{{$social_media_link ?? 'Link to social media profile not found'}}</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    @if(!empty($social_schema))
                        <h6><span><img src="images/green.png"></span>Schema for social media profiles</h6>
                    @else
                        <h6><span><img src="images/orange.png"></span>Schema for social media profiles</h6>
                    @endif
                </div>
                <div class="col-md-9">
                    @if(!empty($social_schema))
                        <p>Schema for social media profiles found</p>
                    @else
                    <p>Schema for social media profiles not found</p>
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
                    @if(!empty($robot))
                        <h6><span><img src="images/green.png"></span>Robots.txt</h6>
                    @else
                        <h6><span><img src="images/orange.png"></span>Robots.txt</h6>
                    @endif
                </div>
                <div class="col-md-9">
                    @if(!empty($robot))
                        <p>Robot.txt found</p>
                        @foreach($robot as $i => $val)
                            @if ($i % 2 == 0)
                                <p style="display: inline-block;">{{$val}}</p>
                            @else
                                <p style="display: inline-block;">{{$val}}</p> <br>
                            @endif
                        @endforeach
                    @else
                        <p>Robot.txt not found</p>
                    @endif

                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    @if(!empty($sitemap))
                        <h6><span><img src="images/green.png"></span>XML Sitemap file</h6>
                    @else
                        <h6><span><img src="images/orange.png"></span>XML Sitemap file</h6>
                    @endif
                </div>
                <div class="col-md-9">
                    @if(!empty($sitemap))
                        <p>Sitemap file found</p>
                    @else
                        <p>Sitemap file not found</p>
                    @endif
                </div>
            </div>

        </div>
    </section>
