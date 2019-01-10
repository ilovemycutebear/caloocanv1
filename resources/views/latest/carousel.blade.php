@extends('masterdesign')




@section('content')
   <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="15000">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
    <li data-target="#myCarousel" data-slide-to="4"></li>
    <li data-target="#myCarousel" data-slide-to="5"></li>
    <li data-target="#myCarousel" data-slide-to="6"></li>
    <li data-target="#myCarousel" data-slide-to="7"></li>
    <li data-target="#myCarousel" data-slide-to="8"></li>
    <li data-target="#myCarousel" data-slide-to="9"></li>
    <li data-target="#myCarousel" data-slide-to="10"></li>
    <li data-target="#myCarousel" data-slide-to="11"></li>
    <li data-target="#myCarousel" data-slide-to="12"></li>
    <li data-target="#myCarousel" data-slide-to="13"></li>
    <li data-target="#myCarousel" data-slide-to="14"></li>
    <li data-target="#myCarousel" data-slide-to="15"></li>



  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="{{URL::asset('img/pics/2.jpg')}}" alt="ayyy">
      <div class="container">
      <div class="row carousel-caption">
        <div class="col-xs-12 text-center"><h5>NIA MARIIS</h5></div>
        <div class="col-lg-4"><h1></h1></div>
        <div class="col-lg-4"><h1></h1></div>
        <div class="col-lg-4"><h1></h1></div>
        <div class="col-lg-4"></div>
        <div class="col-lg-4"></div>
        <div class="col-lg-4"></div>
        <div class="col-xs-12"></div>
     </div>
      </div>
    </div>
   
    @foreach($latestcrsl as $siteinfos)
    <div class="item">
     <img src="{{URL::asset('img/pics/'.$siteinfos->pic.'.jpg')}}" alt="ayyy">
      <div class="container">
       <div class="row carousel-caption">
        <div class="col-xs-12 text-center"><h5>{{ $siteinfos->Site }}</h5></div>
        <div class="col-xs-12 text-center"><h7>{{ $siteinfos->subname }}</h7></div>\
        <div class="col-xs-12 text-center"><h8>LAT: {{ $siteinfos->lattitude }}</h8></div>
        <div class="col-xs-12 text-center"><h8>LONG: {{ $siteinfos->longtitude }}</h8></div>
        @if( $siteinfos->sensor == 1 )
        <div class="col-lg-4"><h2>RAIN</h2></div>
        <div class="col-lg-4"><h2>    </h2></div>
        @endif

        @if( $siteinfos->sensor == 2 )
        <div class="col-lg-4"><h2>LEVEL</h2></div>
        <div class="col-lg-4"><h2>     </h2></div>
        @endif

         @if( $siteinfos->sensor == 3 )
        <div class="col-lg-4"><h2>RAIN</h2></div>
        <div class="col-lg-4"><h2>LEVEL</h2></div>
        @endif

        <div class="col-lg-4"><h2>BATTERY</h2></div>

        @if( $siteinfos->sensor == 1 )
        <div class="col-lg-4"><h3>{{ $siteinfos->rainten }} <h6>milimeters</h6></h3></div>
        <div class="col-lg-4"><h3>       </h3></div>
        @endif

        @if( $siteinfos->sensor == 2 )
        <div class="col-lg-4"><h3>{{ $siteinfos->water }} <h6>meters</h6></h3></div>
        <div class="col-lg-4"><h3>     </h3></div>
        @endif
        @if( $siteinfos->sensor == 3 )
        <div class="col-lg-4"><h3>{{ $siteinfos->rainten }} <h6>milimeters</h6></h3></div>
        <div class="col-lg-4"><h3>{{ $siteinfos->water }} <h6>meters</h3></div>
        @endif
        <!--comment-->

        <div class="col-lg-4"><h3>{{ $siteinfos->voltage }} <h6>Voltage</h6></h3></div>
        <div class="col-xs-12"><h4>DATA AS OF: {{$siteinfos->asof}}</h4></div>
     </div>
      </div>
    </div>
       @endforeach

  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

@stop
