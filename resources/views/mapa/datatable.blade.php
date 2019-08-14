@extends('masterdesign')


@section('content')
<div class="container-fluid">
  <!--#################################################DIVIDER######################################################################-->
    <div class="col-xs-6">

<!--#################################################DIVIDER######################################################################-->
 <!--*********TABLES**************-->
       <div id="table_latest" class="alert-dark text-center"><h1>LATEST DATA(RAIN)</h1></div>
        <table class="table table-bordered" id="latest-tablern">
        <thead>
            <tr class="bg-dark">
                <th><h5>SITE NAME</h5></th>
                <th><h5>DATE/TIME</h5></th>
                <th><h5>RAIN<br>5 MIN</h5></th>
            </tr>
        </thead>
       </table>
        <!--*********TABLES**************-->
       <!--*********TABLES**************-->
       <div id="table_latest" class="alert-dark text-center"><h1>HOURLY DATA(RAIN)</h1></div>
       <div id="table_latest" class="alert-dark text-center"><h5>(e.g., 8:00-9:00 , 12:00-1:00 , 5:00-6:00)</h5></div>
        <table class="table table-bordered" id="hourly-tablern">
        <thead>
            <tr class="bg-dark">
                <th><h5>SITE NAME</h5></th>
                <th><h5>HOURLY<br>RAIN</h5></th>
            </tr>
        </thead>
       </table>
        <!--*********TABLES**************-->
     <!--*********TABLES**************-->
       <div id="table_latest" class="alert-dark text-center"><h1>24 HR DATA(RAIN)</h1></div>
       <div id="table_latest" class="alert-dark text-center"><h5>8:00 AM TODAY UP TO 8:00 AM TOMORROW</h5></div>
        <table class="table table-bordered" id="daily-tablern">
        <thead>
            <tr class="bg-dark">
                <th><h5>SITE NAME</h5></th>
                <th><h5>24 <br>HOURS</h5></th>
            </tr>
        </thead>
       </table>
        <!--*********TABLES**************-->
<!--#################################################DIVIDER######################################################################-->
    </div><!--colmd4-->
<!--#################################################DIVIDER######################################################################-->
    <div class="col-xs-6">

<!--#################################################DIVIDER######################################################################-->
 <!--*********TABLES**************-->
       <div id="table_latest" class="alert-dark text-center"><h1>LATEST DATA (WATER LEVEL)</h1></div>
        <table class="table table-bordered" id="latest-tablewl">
        <thead>
            <tr class="bg-dark">
                <th><h5>SITE NAME</h5></th>
                <th><h5>CREATED AT</h5></th>
                <th><h5>WL</h5></th>
            </tr>
        </thead>
       </table>
        <!--*********TABLES**************-->
       <!--*********TABLES**************-->
       <div id="table_latest" class="alert-dark text-center"><h1>HOURLY DATA (WATER LEVEL)</h1></div>
        <table class="table table-bordered" id="hourly-tablewl">
        <thead>
            <tr class="bg-dark">
                <th><h5>SITE NAME</h5></th>
                <th><h5>AVERAGE LEVEL<br>1 HR</h5></th>
            </tr>
        </thead>
       </table>
        <!--*********TABLES**************-->
         <!--*********TABLES**************-->
       <div id="table_latest" class="alert-dark text-center"><h1>WARNINGS</h1></div>
        <table class="table table-bordered" id="table-warningwrn">
        <thead>
            <tr class="bg-dark">
                <th><h5>SITE NAME</h5></th>
                <th><h5>ALERT</h5></th>
                <th><h5>ALARM</h5></th>
                <th><h5>CRITICAL</h5></th>
            </tr>
        </thead>
       </table>
        <!--*********TABLES**************-->
<!--#################################################DIVIDER######################################################################-->
    </div><!--colmd4-->
</div>

@push('map-scripts')
<script>
drawlatestable();
warningtable();
drawhourlytable();

drawlatestablern();
drawhourlytablern();
drawdailytablern();

setInterval(function(){
    //clusterGroup.clearLayers();
    //console.log("refreshing data");
    //loadmarkers();
     $('#latest-table').DataTable().destroy();
     $('#hourly-table').DataTable().destroy();
    $('#latest-tablern').DataTable().destroy();
     $('#hourly-tablern').DataTable().destroy();
    drawlatestable();
    drawhourlytable();
    drawlatestablern();
    drawhourlytablern();
     drawdailytablern();
  }, 60000);
function calltablern(){

    $('#users-tablern').DataTable({
        destroy: true,
        ajax: '{{URL::asset('data')}}'+"/"+clckr,
        columns: [
            { data: 'name', name: 'name' },
            { data: 'created_at', name: 'created_at' },
            { data: 'batteryvolt', name: 'batteryvolt' , orderable: false},
            { data: 'rvalue', name: 'rvalue' }
        ],
        dom: 'Bfrtip',
        buttons: [
             'copy', 'excel', 'pdf', 'print'
        ]
    });
}
function drawhourlytablern(){

    $('#hourly-tablern').DataTable({
        destroy: true,
        processing: true,
        serverSide: true,
        searching: false,
        ordering: false, //remove ordering button
        bInfo : false, //remove showing entries
        paging: false,
        ajax: '{{URL::asset('hourlydata')}}',
        columns: [
            { data: 'name', name: 'name' },
            { data: 'rain', name: 'rain' }
        ]
    });
}
function drawdailytablern(){

    $('#daily-tablern').DataTable({
        destroy: true,
        processing: true,
        serverSide: true,
        searching: false,
        ordering: false, //remove ordering button
        bInfo : false, //remove showing entries
        paging: false,
        ajax: '{{URL::asset('dailydata')}}',
        columns: [
            { data: 'name', name: 'name' },
            { data: 'rain', name: 'rain' }
        ]
    });
}
function drawlatestablern(){
    $('#latest-tablern').DataTable({
        destroy: true,
         searching: false,
         paging: false,
        bSort : false, //disable datatable sorting so it is sorted by wltbm
        ordering: false, //remove ordering button
        bInfo : false, //remove showing entries
        paging: false,
        "ajax": "{{URL::asset('latestdata')}}",
        "columns": [
            { "data": 'Site', "name": 'name' },
            { "data": 'asof', "name": 'datetime' },
            { "data": 'rainten', "name": 'rvalue' },

        ]
    });
}
function calltable(){

    $('#users-tablewl').DataTable({
        destroy: true,
        ajax: '{{URL::asset('wldata')}}'+"/"+clckr,
        columns: [
            { data: 'name', name: 'name' },
            { data: 'created_at', name: 'created_at' },
            { data: 'batteryvolt', name: 'batteryvolt' , orderable: false},
            { data: 'wlevel', name: 'wlevel' }
        ], 
        dom: 'Bfrtip',
        buttons: [
             'copy', 'excel', 'pdf', 'print'
        ]
    });
}
function warningtable(){
    $('#table-warningwrn').DataTable({
        destroy: true,
        processing: true,
        serverSide: true,
        searching: false,
        bSort : false,
        paging: false,
        ordering: false, //remove ordering button
        bInfo : false, //remove showing entries
        ajax: '{{URL::asset('editalerts')}}',
        columns: [
            { data: 'name', name: 'name' },
            { data: 'wlalert', name: 'wlalert' },
             { data: 'wlalarm', name: 'wlalarm' },
              { data: 'wlcritical', name: 'wlcritical' }
        ]
    });
}
function drawhourlytable(){

    $('#hourly-tablewl').DataTable({
        destroy: true,
        processing: true,
        serverSide: true,
        searching: false,
        bSort : false,
        paging: false,
        ordering: false, //remove ordering button
        bInfo : false, //remove showing entries
        ajax: '{{URL::asset('wlhourlydata')}}',
        columns: [
            { data: 'name', name: 'name' },
            { data: 'water', name: 'water' }
        ]
    });
}
function drawlatestable(){

    $('#latest-tablewl').DataTable({
        destroy: true,
        ordering: false, //remove ordering button
        bInfo : false, //remove showing entries
          bSort : false, //disable datatable sorting so it is sorted by wltbm
         searching: false,
         paging: false,
        "ajax": "{{URL::asset('wllatestdata')}}",
        "columns": [
            { "data": 'Site', "name": 'Site' },
            { "data": 'asof', "name": 'asof' },
            { "data": 'water', "name": 'water' },


       ],        
    });
}
//google.load('visualization', '1', {packages: ['controls', 'charteditor']});

</script>
@endpush

@stop