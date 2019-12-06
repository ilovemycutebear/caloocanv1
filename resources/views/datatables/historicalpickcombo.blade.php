@extends('masterdesign')


@section('content')
    <div class="container-fluid">
        <div id="modalcontainer">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" >
       

        <div class="modal-body">
        <!--*********TABS**************-->
      <ul class="nav nav-tabs" id="myTab">
        <li class="active"><a data-target="#table" data-toggle="tab">Table</a></li>
        <li><a data-target="#rnchart" data-toggle="tab">Rain Chart</a></li>
        <li><a data-target="#wlchart" data-toggle="tab">Level Chart</a></li>
      </ul>

      <div class="tab-content">
        <div class="tab-pane active" id="table">
       <!--*********TABLES**************-->
       <div id="control_label" class="text-center" style="background-color: #03396;"><h1>TABLE INFORMATION</h1></div>
        <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>NAME</th>
                <th>DATE/TIME</th>
                <th>BATTERY</th>
                <th>RAIN</th>
                <th>WATER LEVEL</th>

            </tr>
        </thead>
       </table>
        <!--*********TABLES**************-->
        </div>

         <!--*********WLCHARTS**************-->
        <div class="tab-pane" id="wlchart">
         <div id="control_label" class="text-center" style="background-color: #03396c;"><h1>HISTORICAL GRAPH</h1></div>
        <!--*********WLCHARTS**************-->
        
       <div id="wlcontrol_div" style="width: 1000px; height: 700px; "></div>

        </div>


        <div class="tab-pane" id="rnchart">
         <div id="control_label" class="text-center"  style="background-color: #03396c;"><h1>HISTORICAL GRAPH</h1></div>
        <!--*********WLCHARTS**************-->
        
       <div id="rncontrol_div" style="width: 1000px; height: 700px; "></div>

        </div>
      </div>
<!--*********TABS**************-->
      </div>
        </div>
      
    </div>
  </div>
</div>

</div>
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">HISTORICAL DATA</div>

                    <div class="panel-body">
                      

                            <div class="form-group">
                                 <label class="col-md-4 control-label">Select Site:</label>
                                <div class="col-md-6">
                                 <select class="form-control" id="sel1" name="sitename">
                                    @foreach($siteinfocombo as $siteinfos)
                                      <option>{{$siteinfos->name}} || {{$siteinfos->id}}</option>
                                    @endforeach
                                  </select>
                                </div>
                            </div>
                            
<br />
<br />
<br />


                            <div class="form-group">
                               <label for="csv_file" class="col-md-4 control-label">SELECT DATE RANGE</label>

                                <div class="col-md-6">

                                   <input type="text" name="daterange" id="datepicker" />

                                </div>
                            </div>
<br />
<br />
<br />
                            <div class="form-group">
                               <label for="csv_file" class="col-md-4 control-label"></label>

                                <div class="col-md-6">

                                   NOTE: select "CUSTOM RANGE" for time specific filtering.

                                </div>
                            </div>
                             
                    </div>
                </div>
            </div>
        </div>
    </div>

@push('map-scripts')
<script>
$(document).ready(function() {
    var start = moment();
    var end = moment().add(1, 'days');
    var formattedDate;

    function cb(start, end) {
        $('#datepicker span').html(start.format('YYYY-MM-DD HH:mm:ss') + ' - ' + end.format('YYYY-MM-DD HH:mm:ss'));
    }

    $('#datepicker').daterangepicker({
        timePicker: true,
        startDate: start,
        endDate: end,
        locale: { 
            format: 'YYYY/MM/DD HH:mm:ss'
                },
        ranges: {
        }
    }, cb);

    cb(start, end);
$('#datepicker').on('apply.daterangepicker', function(ev, picker) {
            
            RNcalltable();
            drawRnChart();
            //drawDsChart();
            drawWlhart();

            $('#myModal').modal('show');

});



function RNcalltable(){
    var daterangestring = $("#datepicker").val();
    var siterangestring = $("#sel1 option:selected").text();
    console.log(siterangestring); //adding comment so hopefully this works
    console.log(daterangestring);
    $('#users-table').DataTable({
        destroy: true,
        ajax: {
            "url": '{{URL::asset('hstrycombo/update')}}',
            "data" : {
                "_token": "{{ csrf_token() }}",
                daterange: daterangestring, 
                sitename: siterangestring
            },
            "type": "POST"
        },
        columns: [
            { data: 'Site', name: 'Site' },
            { data: 'asof', name: 'asof' },
            { data: 'voltage', name: 'voltage' , orderable: false},
            { data: 'rainten', name: 'rainten' },
            { data: 'rawlvl', name: 'rawlvl' }
        ], 
        dom: 'Bfrtip',
        buttons: [
             'copy', 'excel', 'pdf', 'print'
        ]
    });
}

function drawRnChart() {


    var daterangestring = $("#datepicker").val();
    var siterangestring = $("#sel1 option:selected").text();

    var sitenm = siterangestring.split('||');
    var fnsitenm = sitenm[0];
    var fnsiteid = sitenm[1];


    var dataPoints = [];
    var chart = new CanvasJS.Chart("rncontrol_div",{
    animationEnabled: true,
    zoomEnabled: true,
    title:{
        text:"Level Data of "+fnsitenm+ " From: "+daterangestring
    },
    data: [{
        type: "line",
        xValueFormatString: "DD-MMM-YYYY HH-mm",
        dataPoints : dataPoints,
    }]
});
    $.post('{{URL::asset('hstrycombo/chartrn')}}',{ 

                "_token": "{{ csrf_token() }}",
                daterange: daterangestring, 
                sitename: siterangestring

    }, function(data) {  
        $.each(data, function(key, value){
        dataPoints.push({
            x: new Date(value.x),
            y: parseFloat(value.y)
            });
        console.log(value);
         }); 
    //to check if bootstrap tabs is loaded beore loading the chart
        $('.nav-tabs a').on('shown.bs.tab', function(event){
        var x = $(event.target).text();         // active tab
        var y = $(event.relatedTarget).text();  // previous tab
                if(x=="Rain Chart"){
                        chart.render();
                }
        });

},"json");

}
function drawWlhart() {


    var daterangestring = $("#datepicker").val();
    var siterangestring = $("#sel1 option:selected").text();

    var sitenm = siterangestring.split('||');
    var fnsitenm = sitenm[0];
    var fnsiteid = sitenm[1];


    var dataPoints = [];
    var chart = new CanvasJS.Chart("wlcontrol_div",{
    animationEnabled: true,
    zoomEnabled: true,
    title:{
        text:"Level Data of "+fnsitenm+ " From: "+daterangestring
    },
    data: [{
        type: "line",
        xValueFormatString: "DD-MMM-YYYY HH-mm",
        dataPoints : dataPoints,
    }]
});
    $.post('{{URL::asset('hstrycombo/chartlvl')}}',{ 

                "_token": "{{ csrf_token() }}",
                daterange: daterangestring, 
                sitename: siterangestring

    }, function(data) {  
        $.each(data, function(key, value){
        dataPoints.push({
            x: new Date(value.x),
            y: parseFloat(value.y)
            });
        console.log(value);
         }); 
    //to check if bootstrap tabs is loaded beore loading the chart
        $('.nav-tabs a').on('shown.bs.tab', function(event){
        var x = $(event.target).text();         // active tab
        var y = $(event.relatedTarget).text();  // previous tab
                if(x=="Level Chart"){
                        chart.render();
                }
        });

},"json");

}
function drawDsChart() {


    var daterangestring = $("#datepicker").val();
    var siterangestring = $("#sel1 option:selected").text();

    var sitenm = siterangestring.split('||');
    var fnsitenm = sitenm[0];
    var fnsiteid = sitenm[1];


    var dataPoints = [];
    var maxval = [];
    var minval;
    var arry = [];
    var arrx = [];
    var chart = new CanvasJS.Chart("dscontrol_div",{
    animationEnabled: true,
    zoomEnabled: true,
    title:{
        text:"Discharge Data of "+fnsitenm+ " From: "+daterangestring
    },
    data: [{
        type: "spline",
        xValueFormatString: "DD-MMM-YYYY HH-mm",
        dataPoints : dataPoints,
    }],
      axisY:maxval,
});
    $.post('{{URL::asset('hstrycombo/chartdsc')}}',{ 

                "_token": "{{ csrf_token() }}",
                daterange: daterangestring, 
                sitename: siterangestring

    }, function(data) {  
        $.each(data, function(key, value){
        dataPoints.push({
            x: new Date(value.x),
            y: parseFloat(value.y)
            });

         arrx.push(value.x);
         arry.push(value.y);

         }); 
         maxval.push({
            minimum:  parseFloat(Math.min.apply(Math,arry)),
            maximum: parseFloat(Math.max.apply(Math,arry)),
            title: "Discharge"
            });
         console.log(maxval);
    //to check if bootstrap tabs is loaded beore loading the chart
        $('.nav-tabs a').on('shown.bs.tab', function(event){
        var x = $(event.target).text();         // active tab
        var y = $(event.relatedTarget).text();  // previous tab
                if(x=="Discharge Chart"){
                        chart.render();
                }
        });

},"json");

}

        $(".modal").on("hidden.bs.modal", function(){
                $('#table').trigger('click');
                console.log("active");
            });
    
  });

  

  
  </script>
@endpush

@stop