@extends('masterdesign')
@section('content')
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<div class="custom-container container">
    <div class="row" style="padding-left: 150px;">
      @foreach($latestcrsl as $siteinfos)
        <div class="col-md-4 center-block"><h1 class="bg-texta">{{ $siteinfos->Site }}</h1></div>
      @endforeach

          <div class="col-xs-6 col-md-4 center-block"><h2 class="bg-textb">LEVEL</h2></div>
          <div class="col-xs-6 col-md-4 center-block"><h2 class="bg-textb">LEVEL</h2></div>
           <div class="col-xs-6 col-md-4 center-block"><h2 class="bg-textb">RAIN</h2></div>
    
        <div class="col-xs-6 col-md-4 center-block"><h2 class="bg-textc">   {{ $latestcrsl[0]->water}} M</h2></div>

        <div class="col-xs-6 col-md-4 center-block"><h2 class="bg-textc">   {{ $latestcrsl[1]->water}} M</h2></div>

        <div class="col-xs-6 col-md-4 center-block"><h2 class="bg-textc">   {{ $latestcrsl[2]->rainten }} mm</h2></div>

      @foreach($latestcrsl as $siteinfos)
        <div class="col-md-4 center-block"><h3 class="bg-textd">DATA AS OF: {{$siteinfos->asof}}</h3></div>
      @endforeach
    </div>
</div>
@stop