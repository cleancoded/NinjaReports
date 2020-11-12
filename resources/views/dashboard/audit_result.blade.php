    <div class="row audit-text pt-3 pb-3">
        <div class="col-md-5">
            <h5><STRONG>SEO AUDIT REPORT: </STRONG>{{$url}}</h5>
        </div>
        <div class="col-md-2">

        </div>
        <div class="col-md-5 text-right">
            <h5>Last Crawled: {{$time}}</h5>
        </div>
    </div>

    <!------------------------------------------ProgressBar Codes----------------------------------------------------->
    <section id="overview">
        <div class="row four-cols">
            <div class="col-md-3">
                <h5>ON-PAGE SEO SCORE</h5>
                <div class="blue" >
                    <div class="Progress" data-animate="false">
                        <div class="circle" data-percent="<?php echo round($health_score); ?>" style="margin-left: 20%;">
                            <div></div>
                        </div>
                    </div>
                </div>
                <h6 style="margin-top:15%;">{{$passed_pages < 0 ? 0 : $passed_pages}} URLs Passed</h6>
                <h6>{{$errors}} Errors</h6>
                <h6>{{$warning}} Warnings</h6>
                <h6>{{$notices}} Notices</h6>
            </div>

            <div class="col-md-3 error-box">
                <h5 style="color: red;">ERRORS</h5>
                <h5 class="number-error">{{$errors}}</h5>
                <p>Errors are SEO issues that have the highest impact on your website's SEO performance.</p>
                <p>@if(!empty($status404))  @endif  {{!empty($status404) ? 'Broken links found':''}}</p>
                <p>@if(!empty($status500))   @endif  {{!empty($status500) ? '500 error found':''}}</p>
                <p>@if(!empty($page_miss_title))      @endif  {{!empty($page_miss_title)? 'Title tag missing':''}}</p>
                <p>@if(!empty($page_without_canonical))  @endif  {{!empty($page_without_canonical) ? 'Canonical tag missing on some pages':''}}</p>
                <p>@if(!empty($duplicate_meta_description))  @endif    {{!empty($duplicate_meta_description) ? 'Duplicate meta discriptions found' : ''}}</p>
                <p>@if(!empty($duplicate_title))     @endif  {{!empty($duplicate_title) ? 'Duplicate title tags found' : ''}}</p>
                <div class="link-div text-right">
                   <p> <a href="#errors">View errors</a></p>
                </div>
            </div>

            <div class="col-md-3 warning-box">
                <h5 style="color:orange;">WARNINGS</h5>
                <h5 class="number-error">{{$warning}}</h5>
                      <p>Warnings have less impact on your SEO performance but should not be overlooked.</p>
                <p>@if(!empty($less_page_words))   @endif {{!empty($less_page_words)   ? 'Low word count found':''}}</p>
                <p>@if(!empty($links_empty_h1))    @endif    {{!empty($links_empty_h1)    ? 'H1 missing found':''}}</p>
                <p>@if(!empty($duplicate_h1))        @endif    {{!empty($duplicate_h1) ? 'H1 duplicate found':''}}</p>
                <p>@if(!empty($page_miss_meta))   @endif     {{!empty($page_miss_meta)    ? 'Some pages missing description':''}}</p>
                <p>@if(!empty($page_incomplete_card))  @endif     {{!empty($page_incomplete_card)  ? 'Twitter card incomplete' :''}}</p>
                <p>@if(!empty($page_incomplete_graph))   @endif  {{!empty($page_incomplete_graph) ? 'Open Graph tags incomplete':''}}</p>
                <p>@if(!empty($status301))          @endif  {{!empty($status301)     ? '301 found':''}}</p>
                <p class="match">@if(!empty($status302))  @endif {{!empty($status302) ? '302 found':''}}</p>
               
                <div class="link-div text-right">
                    <p> <a href="#warnings">View Warnings</a></p>
                </div>
            </div>
            <div class="col-md-3 notice-box">
                <h5 style="color:lightblue;">NOTICES</h5>
                <h5 class="number-error">{{$notices}}</h5>
                  <p>Notices are not critical to your SEO performance but should be corrected.</p>
                <p>@if(!empty($page_h1_less))    @endif      {{!empty($page_h1_less)    ? 'H1 too short found'   :''}}</p>
                <p>@if(!empty($page_h1_greater))     @endif   {{!empty($page_h1_greater)  ? 'H1 too long found'    :''}}</p>
                <p>@if(!empty($links_more_h1))     @endif     {{!empty($links_more_h1) ? 'H1 two time found on page':''}}</p>
                <p>@if(!empty($short_title))       @endif        {{!empty($short_title) ? 'Title too short found':''}}</p>
                <p>@if(!empty($long_title))          @endif    {{!empty($long_title)  ? 'Title too long found' :''}}</p>
                <p>@if(!empty($url_length))       @endif    {{!empty($url_length)  ?  'Longs URL found'     :''}}</p>
                <p>@if(empty($twitter))        @endif    {{!empty($twitter) ? '' :'Twitter card missing'}}</p>
                <p>@if(empty($graph_data))      @endif     {{!empty($graph_data) ? '' :'Open graph missing'}}</p>
                <p>@if(!empty($less_code_ratio))        @endif      {{!empty($less_code_ratio) ? 'Text to code ratio < 10% found' : ''}}</p>
                <p>@if(!empty($long_meta_description))   @endif    {{!empty($long_meta_description) ? 'Long meta description found' : ''}}</p>
                <p>@if(!empty($short_meta_description))  @endif    {{!empty($short_meta_description) ? 'Short meta description found' : ''}}</p>
                <p class="match">{{empty($robot) ? 'Robot.txt missing' : ''}}</p>

                <div class="link-div text-right">
                    <p><a href="#notices">View Notices</a></p>
                </div>

            </div>
        </div>
    </section>

    <section id="errors">
   
            <div class="row errors-table">
                <table class="table">
                    <h4 style="color: red;padding: 10px;">
                        Errors {{$errors}}
                    </h4>
                    <thead>
                        <tr>
                        <th>URL</th>
                        <th>Error</th>
                        <th>How to Fix</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(!empty($page_without_canonical))
                        @foreach($page_without_canonical as $val)
                            <tr>
                                <td><a href="{{$val}}" target="_blank">{{$val}}</a></td>
                                <td>Your canonical tag is missing. Canonical tags are important because they tell search engines what the correct URL of the page should be.</td>
                                <td>Add a canonical tag to your website pages.</td>
                            </tr>
                        @endforeach    
                    @endif

                    @if(!empty($duplicate_title))
                        @foreach($duplicate_title as $key => $val)
                            <tr>
                                <td><a href="{{$key}}" target="_blank">{{$key}}</a></td>
                                <td>One or more pages have identical title tags.</td>
                                <td>Make sure to rewrite duplicate title tags where needed so that every page on your site has a unique title tag.</td>
                            </tr>
                        @endforeach    
                    @endif

                    @if(!empty($duplicate_meta_description))
                        @foreach($duplicate_meta_description as $key => $val)
                            <tr>
                                <td><a href="{{$key}}" target="_blank">{{$key}}</a></td>
                                <td>One or more pages have identical meta description tags.</td>
                                <td>Each URL/page should have a unique meta description tag.</td>
                            </tr>
                        @endforeach    
                    @endif

                    @if(!empty($link_500))
                        @foreach($link_500 as  $val)
                            <tr>
                                <td><a href="{{$val}}" target="_blank">{{$val}}</a></td>
                                <td>your page has 500 error</td>
                                <td>Find the link or links that are broken and change it to the correct page or take the link off.</td>
                            </tr>
                        @endforeach    
                    @endif

                    @if(!empty($link_404))
                        @foreach($link_404 as  $val)
                            <tr>
                                <td><a href="{{$val}}" target="_blank">{{$val}}</a></td>
                                <td>You have broken links on your page. Those links are sending users to a page that does not exist.</td>
                                <td>Find the link or links that are broken and change it to the correct page or take the link off.</td>
                            </tr>
                        @endforeach    
                    @endif
                    </tbody>
                    </table>
            </div>
    </section>
    
    <section id="warnings">
        <div class="row errors-table">
                <table class="table">
                    <h4 style="color: orange;padding: 10px;">
                        WARNINGS {{$warning}}
                    </h4>
                    <thead>
                        <tr>
                        <th>URL</th>
                        <th>Error</th>
                        <th>How to Fix</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($links_empty_h1))
                            @foreach($links_empty_h1 as $link)
                                <tr>
                                    <td><a href="{{$link}}" target="_blank">{{$link}}</a></td>
                                    <td>Your page is not using heading tags appropriately. Heading tags are the section titles of your content. They should be structured correctly.</td>
                                    <td>Make sure the page has one H1 tag to signal the most important topic of the page and descending tags to show other topics.</td>
                                </tr>
                            @endforeach    
                        @endif

                        @if(!empty($less_page_words))
                            @foreach($less_page_words as $val)
                                <tr>
                                    <td><a href="{{$val}}" target="_blank">{{$val}}</a></td>
                                    <td>There are less than 600 words of content on this page. It is recommended to add more quality text to this page to rank well.</td>
                                    <td>Try adding more content and main keywords to your page so search engines know what it is about.</td>
                                </tr>
                            @endforeach    
                        @endif

                        @if(!empty($page_miss_meta))
                            @foreach($page_miss_meta as $val)
                                <tr>
                                    <td><a href="{{$val}}" target="_blank">{{$val}}</a></td>
                                    <td>Your meta description is missing. Meta descriptions are important for your CTR, which is a ranking factor for search engines.</td>
                                    <td>Add a meta description (between 150-160 characters) that describes what your page is about.</td>
                                </tr>
                            @endforeach    
                        @endif
                        
                        @if(!empty($link_302))
                            @foreach($link_302 as $val)
                                <tr>
                                    <td><a href="{{$val}}" target="_blank">{{$val}}</a></td>
                                    <td>302 redirects</td>
                                    <td>Your page has a 302 redirect. Link directly to the redirected page or remove the 302 redirect.</td>
                                </tr>
                            @endforeach    
                        @endif
                        
                        @if(!empty($link_301))
                            @foreach($link_301 as $val)
                                <tr>
                                    <td><a href="{{$val}}" target="_blank">{{$val}}</a></td>
                                    <td>301 redirects</td>
                                    <td>Your page has a 301 redirect. Link directly to the redirected page or remove the 301 redirect.</td>
                                </tr>
                            @endforeach    
                        @endif

                        @if(!empty($page_incomplete_card))
                            @foreach($page_incomplete_card as $val)
                                @if(strpos($val,"facebook") == false && strpos($val,"twitter") == false && strpos($val,"linkedin") == false && strpos($val,"instagram") == false)
                                    <tr>
                                        <td><a href="{{$val}}" target="_blank">{{$val}}</a></td>
                                        <td>Your site is missing open Twitter card tags. These are tags that allow you to control what content shows when a webpage is shared on social media.</td>
                                        <td>Add Twitter Card to fix this issue.</td>
                                    </tr>
                                @endif
                            @endforeach    
                        @endif

                        @if(!empty($page_incomplete_graph))
                            @foreach($page_incomplete_graph as $val)
                                @if(strpos($val,"facebook") == false && strpos($val,"twitter") == false && strpos($val,"linkedin") == false && strpos($val,"instagram") == false)
                                    <tr>
                                        <td><a href="{{$val}}" target="_blank">{{$val}}</a></td>
                                        <td>Your site is missing open graph tags. These are tags that allow you to control what content shows when a webpage is shared on social media.</td>
                                        <td>Add open graph tags to fix this issue.</td>
                                    </tr>
                                @endif
                            @endforeach    
                        @endif
                    </tbody>
                    </table>
            </div>
    </section>
    
    <section id="notices">
        <div class="row errors-table">
                <table class="table">
                    <h4 style="color: lightblue;padding: 10px;">
                        NOTICES {{$notices}}
                    </h4>
                    <thead>
                        <tr>
                        <th>URL</th>
                        <th>Error</th>
                        <th>How to Fix</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($links_more_h1) )
                            @foreach($links_more_h1 as $link)
                                <tr>
                                    <td><a href="{{$link}}" target="_blank">{{$link}}</a></td>
                                    <td>Multiple h1 tags found on your page.</td>
                                    <td>Make sure you have only one h1 tag on each page and it includes the main keywords for that page.</td>
                                </tr>
                            @endforeach
                        @endif

                        @if(!empty($page_h1_greater))
                            @foreach($page_h1_greater as $greater)
                                <tr>
                                    <td><a href="{{$greater}}" target="_blank">{{$greater}}</a></td>
                                    <td>H1 too long found</td>
                                    <td>Edit h1 tags so that they have 20-70 characters in length, as recommended.</td>
                                </tr>
                            @endforeach
                        @endif

                        @if(!empty($page_h1_less))
                            @foreach($page_h1_less as $less_h1)
                                <tr>
                                    <td><a href="{{$less_h1}}" target="_blank">{{$less_h1}}</a></td>
                                    <td>H1 too short found</td>
                                    <td>Edit or rewrite the h1 tag so that it includes all the necessary targeted keywords, while also closely describing the content of the page.</td>
                                </tr>
                            @endforeach
                        @endif

                        @if(!empty($long_title))
                            @foreach($long_title as $long)
                                <tr>
                                    <td><a href="{{$long}}" target="_blank">{{$long}}</a></td>
                                    <td>You have a meta title but it is not the optimal length. It needs to be between 50-60 characters to fit inside Google's recommended length.</td>
                                    <td>Update your meta title to be between 50-60 characters in length.</td>
                                </tr>
                            @endforeach
                        @endif

                        @if(!empty($short_title))
                            @foreach($short_title as $short)
                                <tr>
                                    <td><a href="{{$short}}" target="_blank">{{$short}}</a></td>
                                    <td>Title tag too short</td>
                                    <td>The title tag length should be between 50 and 60 characters.</td>
                                </tr>
                            @endforeach
                        @endif

                        @if(!empty($less_code_ratio))
                            @foreach($less_code_ratio as $less)
                                <tr>
                                    <td><a href="{{$less}}" target="_blank">{{$less}}</a></td>
                                    <td>Your text-HTML ratio is off balance. Search engines need text to know what a page is about. You should shoot for a 25-70% text-HTML ratio.</td>
                                    <td>Add more relevant text to your page to bring the ratio back into balance.</td>
                                </tr>
                            @endforeach
                        @endif

                        @if(!empty($long_meta_description))
                            @foreach($long_meta_description as $long_meta)
                                <tr>
                                    <td><a href="{{$long_meta}}" target="_blank">{{$long_meta}}</a></td>
                                    <td>You have a meta description but it is not the optimal length. It needs to be around 160 characters to fit inside Google's recommended length.</td>
                                    <td>Update your meta description to be between 150-160 characters in length.</td>
                                </tr>
                            @endforeach
                        @endif

                        @if(!empty($short_meta_description))
                            @foreach($short_meta_description as $short_meta)
                                <tr>
                                    <td><a href="{{$short_meta}}" target="_blank">{{$short_meta}}</a></td>
                                    <td>The meta description is not the optimal length.</td>
                                    <td>Create a unique meta description of 150 to 160 characters in length.</td>
                                </tr>
                            @endforeach
                        @endif

                        @if(!empty($page_twitter_missing))
                            @foreach($page_twitter_missing as $val)
                                <tr>
                                    <td><a href="{{$val}}" target="_blank">{{$val}}</a></td>
                                    <td>Twitter card missing</td>
                                    <td>Add Twitter card to your page headers.</td>
                                </tr>
                            @endforeach
                        @endif

                        @if(!empty($page_open_graph))
                            @foreach($page_open_graph as $val)
                                <tr>
                                    <td><a href="{{$val}}" target="_blank">{{$val}}</a></td>
                                    <td>Your site is missing open graph tags. These are tags that allow you to control what content shows when a webpage is shared on social media.</td>
                                    <td>Add open graph tags to fix this issue.</td>
                                </tr>
                            @endforeach
                        @endif

                        @if(!empty($url_length))
                            @foreach($url_length as $val)
                                <tr>
                                    <td><a href="{{$val}}" target="_blank">{{$val}}</a></td>
                                    <td>Longs URL found</td>
                                    <td>A site's URL structure should be as simple as possible and include the pages keyword.</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    </table>
            </div>
    </section>
    