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
    <div class="row">
      @foreach($latestcrsl as $siteinfos)
       @if( $siteinfos->siteid == 01 )
        <div class="col-md-4 center-block" style=" margin-left: -200px;"><h1 class="bg-texta">{{ $siteinfos->Site }}</h1></div>
       @endif
       @if( $siteinfos->siteid == 02 )
        <div class="col-md-4 center-block" style=" padding-left: 300px;"><h1 class="bg-texta">{{ $siteinfos->Site }}</h1></div>
       @endif
       @if( $siteinfos->siteid == 03 )
        <div class="col-md-4 center-block" style=" padding-left: 500px;"><h1 class="bg-texta">{{ $siteinfos->Site }}</h1></div>
       @endif
      @endforeach

          <div class="col-xs-6 col-md-4 center-block" style=" margin-left: -200px;"><h2 class="bg-textb">WATER LEVEL</h2></div>
          <div class="col-xs-6 col-md-4 center-block" style="padding-left: 300px;"><h2 class="bg-textb">WATER LEVEL</h2></div>
           <div class="col-xs-6 col-md-4 center-block" style="padding-left: 500px;"><h2 class="bg-textb">RAIN</h2></div>

    
        <div class="col-xs-6 col-md-4 center-block" style=" margin-left: -200px;"><h2 class="bg-textc">{{ $latestcrsl[0]->water}} M </h2></div>
        <div class="col-xs-6 col-md-4 center-block" style=" padding-left: 300px;"><h2 class="bg-textc">   {{ $latestcrsl[1]->water}} M</h2></div>
        <div class="col-xs-6 col-md-4 center-block" style=" padding-left: 500px;"><h2 class="bg-textc">   {{ $latestcrsl[2]->rainten }} mm</h2></div>



          @if($latestcrsl[0]->sensor == 2 )
            @if($latestcrsl[0]->siteid == 01 )
          

        @if(strtotime($latestcrsl[0]->asof) > strtotime(\Carbon\Carbon::now()->subMinutes(20)->format('F d Y h:i:s A')))

          @if($latestcrsl[0]->water < $latestcrsl[0]->alarm)
          <div class="col-xs-6 col-md-4 center-block" style=" margin-left: -200px;"><h4 class="bg-texte"> NORMAL <span class="glyphicon glyphicon glyphicon-map-marker RainGreen"></span></h4></div>
            @endif
            @if(($latestcrsl[0]->water >= $latestcrsl[0]->alarm)&&($latestcrsl[0]->water < $latestcrsl[0]->alert))
            <div class="col-xs-6 col-md-4 center-block" style=" margin-left: -200px;"><h4 class="bg-texte"> ALARM <span class="glyphicon glyphicon glyphicon-map-marker RainBlueGreen"></span></h4></div>
            @endif
            @if(($latestcrsl[0]->water >= $latestcrsl[0]->alert)&&($latestcrsl[0]->water < $latestcrsl[0]->critical))
            <div class="col-xs-6 col-md-4 center-block" style=" margin-left: -200px;"><h4 class="bg-texte"> ALERT <span class="glyphicon glyphicon glyphicon-map-marker RainYellow"></span></h4></div>
            @endif
            @if($latestcrsl[0]->water >= $latestcrsl[0]->critical)
            <div class="col-xs-6 col-md-4 center-block" style=" margin-left: -200px;"><h4 class="bg-texte"> CRITICAL <span class="glyphicon glyphicon glyphicon-map-marker RainRed"></span></h4></div>
            @endif

          @endif

            @if(strtotime($latestcrsl[0]->asof) < strtotime(\Carbon\Carbon::now()->subMinutes(60)->format('F d Y h:i:s A')))
            <div class="col-xs-6 col-md-4 center-block" style=" margin-left: -200px;"><h4 class="bg-texte"> LATE DATA <span class="glyphicon glyphicon glyphicon-map-marker RainGray"></span></h4></div>
            @endif

          @endif
        @endif <!--if siteid is 01-->



            @if($latestcrsl[1]->sensor == 2 )

              @if($latestcrsl[1]->siteid == 02 )
          

          <!--div class="col-xs-6 col-md-4 center-block" style=" padding-left: 500px;"><h2 class="bg-textc">
          {{$siteinfos->asof}}</br>
          {{\Carbon\Carbon::now()->subMinutes(20)->format('F d Y h:i:s A')}}
          </h2></div-->

        @if(strtotime($latestcrsl[1]->asof) > strtotime(\Carbon\Carbon::now()->subMinutes(20)->format('F d Y h:i:s A')))

          @if($latestcrsl[1]->water < $latestcrsl[1]->alarm)
          <div class="col-xs-6 col-md-4 center-block" style=" padding-left: 300px;"><h4 class="bg-texte"> NORMAL <span class="glyphicon glyphicon glyphicon-map-marker RainGreen"></span></h4></div>
            @endif
            @if(($latestcrsl[1]->water >= $latestcrsl[1]->alarm)&&($latestcrsl[1]->water < $latestcrsl[1]->alert))
            <div class="col-xs-6 col-md-4 center-block" style=" padding-left: 300px;"><h4 class="bg-texte"> ALARM <span class="glyphicon glyphicon glyphicon-map-marker RainBlueGreen"></span></h4></div>
            @endif
            @if(($latestcrsl[1]->water >= $latestcrsl[1]->alert)&&($latestcrsl[1]->water < $latestcrsl[1]->critical))
            <div class="col-xs-6 col-md-4 center-block" style=" padding-left: 300px;"><h4 class="bg-texte"> ALERT <span class="glyphicon glyphicon glyphicon-map-marker RainYellow"></span></h4></div>
            @endif
            @if($latestcrsl[1]->water >= $latestcrsl[1]->critical)
            <div class="col-xs-6 col-md-4 center-block" style=" padding-left: 300px;"><h4 class="bg-texte"> CRITICAL <span class="glyphicon glyphicon glyphicon-map-marker RainRed"></span></h4></div>
            @endif

          @endif

            @if(strtotime($latestcrsl[1]->asof) < strtotime(\Carbon\Carbon::now()->subMinutes(60)->format('F d Y h:i:s A')))
            <div class="col-xs-6 col-md-4 center-block" style=" padding-left: 300px;"><h4 class="bg-texte"> LATE DATA <span class="glyphicon glyphicon glyphicon-map-marker RainGray"></span></h4></div>
            @endif

          @endif
        @endif <!--if siteid is 02-->






        @if( $latestcrsl[2]->sensor == 1 )

           @if(($latestcrsl[2]->rainten >=0 )&&($latestcrsl[2]->rainten <=0.9))
            <div class="col-xs-6 col-md-4 center-block" style=" padding-left: 500px;"><h4 class="bg-texte"> NO RAIN <span class="glyphicon glyphicon-tint RainGray"></span></h4></div>
            @endif
            @if(($latestcrsl[2]->rainten >=1 )&&($latestcrsl[2]->rainten <=1.9))
            <div class="col-xs-6 col-md-4 center-block" style=" padding-left: 500px;"><h4 class="bg-texte"><span class="glyphicon glyphicon-tint RainGreen"></span></h4></div>
            @endif
            @if(($latestcrsl[2]->rainten >=2 )&&($latestcrsl[2]->rainten <=9))
            <div class="col-xs-6 col-md-4 center-block" style=" padding-left: 500px;"><h4 class="bg-texte"><span class="glyphicon glyphicon-tint RainBlueGreen"></span></h4></div>
            @endif
            @if(($latestcrsl[2]->rainten >=10 )&&($latestcrsl[2]->rainten <=19))
            <div class="col-xs-6 col-md-4 center-block" style=" padding-left: 500px;"><h4 class="bg-texte"><span class="glyphicon glyphicon-tint RainBlue"></span></h4></div>
            @endif
            @if(($latestcrsl[2]->rainten >=20 )&&($latestcrsl[2]->rainten <=29))
            <div class="col-xs-6 col-md-4 center-block" style=" padding-left: 500px;"><h4 class="bg-texte"><span class="glyphicon glyphicon-tint RainViolet"></span></h4></div>
            @endif
            @if(($latestcrsl[2]->rainten >=30 )&&($latestcrsl[2]->rainten <=39))
            <div class="col-xs-6 col-md-4 center-block" style=" padding-left: 500px;"><h4 class="bg-texte"><span class="glyphicon glyphicon-tint RainYellow"></span></h4></div>
            @endif
            @if(($latestcrsl[2]->rainten >=40 )&&($latestcrsl[2]->rainten <=49))
            <div class="col-xs-6 col-md-4 center-block" style=" padding-left: 500px;"><h4 class="bg-texte"><span class="glyphicon glyphicon-tint RainOrange"></span></h4></div>
            @endif
            @if($latestcrsl[2]->rainten >=50)
            <div class="col-xs-6 col-md-4 center-block" style=" padding-left: 500px;"><h4 class="bg-texte"><span class="glyphicon glyphicon-tint RainRed"></span></h4></div>
            @endif
        @endif





      @foreach($latestcrsl as $siteinfos)
        @if( $siteinfos->siteid == 01 )
        <div class="col-md-4 center-block" style=" margin-left: -200px;"><h3 class="bg-textd">DATA AS OF: {{$siteinfos->asof}}</h3></div>
        @endif
        @if( $siteinfos->siteid == 02 )
        <div class="col-md-4 center-block" style=" padding-left: 300px;"><h3 class="bg-textd">DATA AS OF: {{$siteinfos->asof}}</h3></div>
        @endif
        @if( $siteinfos->siteid == 03 )
        <div class="col-md-4 center-block" style=" padding-left: 500px;"><h3 class="bg-textd">DATA AS OF: {{$siteinfos->asof}}</h3></div>
        @endif

      @endforeach
    </div>
</div>
@stop