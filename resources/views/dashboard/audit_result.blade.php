    <div class="row audit-text pt-3 pb-3">
        <div class="col-md-5">
            <h5><STRONG>SEO AUDIT REPORT:</STRONG>{{$url}}</h5>
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

            <div class="col-md-3">
                <h5 style="color: red;">ERRORS</h5>
                <h5 class="number-error">20</h5>
                <p>{{!empty($status404) ? 'Broken links found':''}}</p>
                <p>{{!empty($status500) ? '500 error found':''}}</p>
                <p>{{!empty($page_miss_title)? 'Title messing found':''}}</p>
                <p>{{!empty($page_miss_canonical) ? 'Canonical missing on some pages':''}}</p>
                <p>{{!empty($duplicate_meta_description) ? 'Duplicate description found' : ''}}</p>
                <p>{{!empty($duplicate_title) ? 'Duplicate title found' : ''}}</p>
                <div class="link-div text-right">
                    <a href="">View errors</a>
                </div>
            </div>

            <div class="col-md-3">
                <h5 style="color:orange;">WARNINGS</h5>
                <h5 class="number-error">93</h5>
                <p>{{!empty($less_page_words) ? 'Low word count found':''}}</p>
                <p>{{!empty($links_empty_h1) ? 'H1 missing found':''}}</p>
                <p>{{!empty($duplicate_h1) ? 'H1 duplicate found':''}}</p>
                <p>{{!empty($page_miss_meta) ? 'Some pages missing description':''}}</p>
                <p>{{!empty($card_incomplete) ? 'Twitter card incomplete' :''}}</p>
                <p>{{!empty($graph_incomplete) ? 'Open Graph tags incomplete':''}}</p>
                <p>{{!empty($status301) ? '301 found':''}}</p>
                <p>{{!empty($status302) ? '302 found':''}}</p>
                <div class="link-div text-right">
                    <a href="">View Warnings</a>
                </div>
            </div>
            <div class="col-md-3">
                <h5 style="color:lightblue;">NOTICES</h5>
                <h5 class="number-error">156</h5>
                <p>{{!empty($page_h1_less)    ? 'H1 too short found'   :''}}</p>
                <p>{{!empty($page_h1_greater)  ? 'H1 too long found'    :''}}</p>
                <p>{{!empty($links_more_h1) ? 'H1 two time found on page':''}}</p>
                <p>{{!empty($short_title) ? 'Title too short found':''}}</p>
                <p>{{!empty($long_title)  ? 'Title too long found' :''}}</p>
                <p>{{!empty($url_length)  ?  'Longs URL found'     :''}}</p>
                <p>{{!empty($page_twitter_card) ? 'Twitter Cards missing' :''}}</p>
                <p>{{!empty($page_open_graph) ? 'Open Graph tags missing' :''}}</p>
                <p>{{!empty($less_code_ratio) ? 'Text to code ratio < 10% found' : ''}}</p>
                <p>{{!empty($long_meta_description) ? 'Long meta description found' : ''}}</p>
                <p>{{!empty($short_meta_description) ? 'Short meta description found' : ''}}</p>
                <p>{{empty($robot) ? 'Robot.txt missing' : ''}}</p>

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
    </section>

    <section id="errors">
        <button class="btn btn-primary Back-to-audit">
                < Back to Audit
            </button>
            <div class="row errors-table">
                <table class="table">
                    <h4 style="color: red;padding: 10px;">
                        Errors(20)
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
                       
                    </tbody>
                    </table>
            </div>
    </section>

    <section id="warnings">
        <div class="row errors-table">
                <table class="table">
                    <h4 style="color: orange;padding: 10px;">
                        WARNINGS(20)
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
                                    <td style="width: 35rem;">{{$link}}</td>
                                    <td>H1 missing found</td>
                                    <td>Lorem IpsumLorem IpsumLorem Ipsum</td>
                                </tr>
                            @endforeach    
                        @endif
                        <tr>
                        <td>Loremipsum@ipsum</td>
                        <td>Lorem Ipsum</td>
                        <td>Lorem IpsumLorem IpsumLorem Ipsum</td>
                        </tr>
                        
                    </tbody>
                    </table>
            </div>
    </section>

    <section id="notices">
        <div class="row errors-table">
                <table class="table">
                    <h4 style="color: lightblue;padding: 10px;">
                        NOTICES(20)
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
                                    <td style="width: 35rem;">{{$link}}</td>
                                    <td>H1 more thin one time found on page</td>
                                    <td>Lorem IpsumLorem IpsumLorem Ipsum</td>
                                </tr>
                            @endforeach
                        @endif

                        @if(!empty($page_h1_greater))
                            @foreach($page_h1_greater as $greater)
                                <tr>
                                    <td>{{$greater}}</td>
                                    <td>H1 too long found</td>
                                    <td>Lorem IpsumLorem IpsumLorem Ipsum</td>
                                </tr>
                            @endforeach
                        @endif

                        @if(!empty($long_title))
                            @foreach($long_title as $long)
                                <tr>
                                    <td>{{$long}}</td>
                                    <td>Title too long found</td>
                                    <td>Lorem IpsumLorem IpsumLorem Ipsum</td>
                                </tr>
                            @endforeach
                        @endif

                        @if(!empty($short_title))
                            @foreach($short_title as $short)
                                <tr>
                                    <td>{{$short}}</td>
                                    <td>Title too short found</td>
                                    <td>Lorem IpsumLorem IpsumLorem Ipsum</td>
                                </tr>
                            @endforeach
                        @endif

                        @if(!empty($less_code_ratio))
                            @foreach($less_code_ratio as $less)
                                <tr>
                                    <td>{{$less}}</td>
                                    <td>Text to code ratio < 10% found</td>
                                    <td>Lorem IpsumLorem IpsumLorem Ipsum</td>
                                </tr>
                            @endforeach
                        @endif

                        @if(!empty($long_meta_description))
                            @foreach($long_meta_description as $long_meta)
                                <tr>
                                    <td>{{$long_meta}}</td>
                                    <td>Long meta description found</td>
                                    <td>Lorem IpsumLorem IpsumLorem Ipsum</td>
                                </tr>
                            @endforeach
                        @endif

                        @if(!empty($short_meta_description))
                            @foreach($short_meta_description as $short_meta)
                                <tr>
                                    <td>{{$short_meta}}</td>
                                    <td>Short meta description found</td>
                                    <td>Lorem IpsumLorem IpsumLorem Ipsum</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    </table>
            </div>
    </section>
