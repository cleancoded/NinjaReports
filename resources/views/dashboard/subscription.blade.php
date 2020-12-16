@extends('layouts.master')
@section('title', 'Ninja Reports Pricing')
@section('content')
<div class="col-md-10 pricing-page">
    @if(!empty($_GET['success']))
        <div class="alert alert-success mt-4">
            <?php echo base64_decode($_GET['success']); ?>
        </div>
    @endif  
<h1 style="width:29%;margin:auto;text-align:center;margin-top: 50px;">Ninja Reports Pricing</h1>
        <h5 style="width:40%;text-align:center;margin:auto;margin-top:2%;">Ninja Reports is a revolutionary SEO audit & analysis tool for agencies, webmasters, and SEOs. Browse our affordable plans below!</h5>
    <div class="container">
            <div class="row three-cols pricing-boxes" style="margin-top:10%;">
                <div class="col-md-4 text-center Webmaster-col">
                    <h3>Webmaster</h3>
                    <p>Affordable Package for webmasters or small businesses wanting to enhance their SEO.</p>               
                    <h5><strong>$29</strong></h5>
                    <h6>per month</h6>
                         @if($status == 1 && $product->id == 'prod_IQ583lkkZ3Ctwr')
                       <h4><a href="javascript:void(0)" class="btn btn-secondary btn-lg" style="pointer-events: none;">CURRENT PLAN</a></h4>
                         @elseif($status == 1)
                        <h4><a href="{{route('payment',['id' => 1])}}" class="btn btn-primary btn-lg">UPGRADE</a></h4>
                         @endif
                        @if($status == 0)
                       <h4><a href="{{route('payment',['id' => 1])}}" class="btn btn-primary btn-lg">FREE 7-DAY TRIAL</a></h4>
                         @endif
                    <a href="#detailed">Learn More</a>
                </div>
                <div class="col-md-4 text-center Business-col" style="padding-top: 0px;">
                    <h6 style="color: white;background-color: #ff6600;position: relative;top:-27px;padding:3px;">MOST POPULAR</h6>
                    <h3>Business</h3>
                    <p>Our most popular package, perfect for businesses with multiple sites or clients looking to grow their traffic.</p>
                    <h5><strong>$49</strong></h5>
                    <h6>per month</h6>
                        @if($status == 1 && $product->id == 'prod_IQ59BGbdGnCcmw')
                       <h4><a href="javascript:void(0)" class="btn btn-secondary btn-lg" style="pointer-events: none;">CURRENT PLAN</a></h4>
                         @elseif($status == 1)
                        <h4><a href="{{route('payment',['id' => 2])}}" class="btn btn-warning btn-lg">UPGRADE</a></h4>
                         @endif
                        @if($status == 0)
                       <h4><a href="{{route('payment',['id' => 2])}}" class="btn btn-warning btn-lg">FREE 7-DAY TRIAL</a></h4>
                         @endif

                    <a href="#detailed">Learn More</a>
                </div>
                <div class="col-md-4 text-center Agency-col">
                    <h3>Agency</h3>
                    <p>For agencies looking to grow their client’s traffic and keep on-page SEO health 100%.
</p>
                    <h5><strong>$99</strong></h5>
                    <h6>per month</h6>
                    @if($status == 1 && $product->id == 'prod_IQ5AeQ7uec9djJ')
                       <h4><a href="javascript:void(0)" class="btn btn-secondary btn-lg" style="pointer-events: none;">CURRENT PLAN</a></h4>
                         @elseif($status == 1)
                        <h4><a href="{{route('payment',['id' => 3])}}" class="btn btn-primary btn-lg">UPGRADE</a></h4>
                         @endif
                        @if($status == 0)
                       <h4><a href="{{route('payment',['id' => 3])}}" class="btn btn-primary btn-lg">FREE 7-DAY TRIAL</a></h4>
                         @endif
                    <a href="#detailed">Learn More</a>
                </div>
            </div>
    </div>
    <div class="container">
          <div class="row Audit-image-text" style="width:100%;padding:25px;margin-top:50px;text-align:center">
<div class="col-md-12"><h3>SEO software that helps grow your traffic, rankings, and sales online.</h3>
    <p>Ninja Report’s revolutionary SEO tools will allow you to get more organic traffic online and grow your business. Check out our features below to see how we can help you grow.</p>
</div>
          </div>
          <hr>
            <div class="row Audit-image-text" style="padding:25px;margin-top:50px;">
                <div class="col-md-7">
                    <h2>Full On-Page SEO Analysis</h2>
                    <p>Run a full on-page SEO audit on your whole website, finding any errors keeping you from ranking high in search engines.</p>

<p>ROur Website SEO Audit Tool will crawl all of your pages and check for SEO errors using our 55-point on-page scan.</p>

<p>RWith the SEO Website Audit Tool, your website’s health will always be at 100%, allowing you to dominate the search engines.</p>
                </div>
                <div class="col-md-5">
                    <img src="images/seo-analysis.png" style="width:100%">
                </div>
            </div>
            <hr>
     <div class="row testimonials Audit-image-text" style="padding:25px;margin-top:50px;">
          <div class="col-md-6">
            <img src="images/brandon.jpeg" style="float:left;margin-right:10px;" alt=""/>
            <h4>Great SEO Tool</h4>
            <p>I save a lot of time using this product. Weekly reports of my website audit in my inbox are a dream come true for any SEO agency or marketer!</p>
            <label>Brandon S.</label>
          </div>
           <div class="col-md-6">
             <img src="images/megan.jpeg" style="float:left;margin-right:10px;" lt=""/>
            <h4>Great All Around Tool</h4>
            <p>Makes audit reporting much faster than it was before with other tools. I estimate I save 10-20 minutes per report with this tool.</p>
            <label>Megan R.</label>
          </div>
    </div>
<div class="row">
    <h2 class="text-center">Detailed Pricing & Packages</h2>
    <a name="detailed"></a>
<table class="table detailed-pricing">
<tbody>
<tr>
<th></th>
<th>Webmaster</th>
<th>Business</th>
<th>Agency</th>
</tr>
<tr>
<td>URL Analysis Reports</td>
<td>300</td>
<td>UNLIMITED</td>
<td>UNLIMITED</td>
</tr>
<tr>
<td>Site Audit Reports</td>
<td>25</td>
<td>100</td>
<td>250</td>
</tr>
<tr>
    <tr>
<td>Price</td>
<td>$29/month</td>
<td>$49/month</td>
<td>$99/month</td>
</tr>
<tr>
<td></td>
<td><a class="btn btn-primary btn-md"  href="{{route('payment',['id' => 1])}}">7-DAY TRIAL</a></td>
<td><a class="btn btn-primary btn-md"  href="{{route('payment',['id' => 2])}}">7-DAY TRIAL</a></td>
<td><a class="btn btn-primary btn-md"  href="{{route('payment',['id' => 3])}}">7-DAY TRIAL</a></td>
</tr>
</tbody>
</table>
</div>
    </div>
</div>
@endsection
