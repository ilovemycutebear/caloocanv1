<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*Route::get('/', function () {
	$places = ['Philippines','Korea','Japan'];
    return view('welcome', compact('places'));
});*/

Route::get('/', 'CarouselController@getlatestCarouseldata');
Route::get('about', 'PagesController@about');



Route::get('rtcurve', 'RatingCurveController@csv');
Route::post('rtcurve','RatingCurveController@showUploadFile');

Route::get('rtcurvepcker', 'RatingCurveController@datetimeselector');
Route::post('rtcurvepcker','RatingCurveController@showpckerfile');


Route::post('/import_parse', 'RatingCurveController@parseImport')->name('import_parse');
Route::post('/import_process', 'RatingCurveController@processImport')->name('import_process');

Route::get('map', 'MapsController@geoinfo');
Route::get('wlmap', 'MapsController@wlgeoinfo');
Route::get('rainmapview', 'MapsController@index');
Route::get('wlevelmapview', 'MapsController@wlindex');
Route::get('dttblview', 'MapsController@dttblindex');
Route::get('raintips','RaintipsController@values');
Route::get('datatable/{sitelog}','RaintipsController@show');
Route::get('rainchart/{rchartid}','RainchartController@view');
Route::get('siteinfo','DatatablesController@index');

Route::get('editinfo','DatatablesController@editalerts');
Route::post('editinfo/update','DatatablesController@updatealerts');
Route::post('editinfo/add','DatatablesController@AddSite');

Route::get('editalerts','DatatablesController@editalertsdata');
Route::get('export','CsvController@exportdata');

Route::get('checkhourly','LatestController@gethourlydata');
Route::get('checkdaily','LatestController@getdailydata');



Route::post('addlog/addlogdata', 'DatatablesController@AddrawData');
Route::get('addlog', 'DatatablesController@AddrawDataView');

Route::get('data','DatatablesController@values');
Route::get('data/{siteid}','DatatablesController@datafl');

Route::get('wldata/{siteid}','DatatablesController@datafl');

Route::get('joined','DatatablesController@InnJoin');
Route::get('laracharts/{chartid}', 'ChartController@getLaraChart');
Route::get('wlaracharts/{chartids}', 'ChartController@getwlLaraChart');
Route::get('latestdata', 'LatestController@getlatestdata');
Route::get('hourlydata', 'LatestController@gethourlydata');\

Route::get('dailydata', 'LatestController@getdailydata');

Route::get('wllatestdata', 'LatestController@wlgetlatestdata');
Route::get('wlhourlydata', 'LatestController@wlgethourlydata');
Route::get('dttbldetails', 'historicalController@wlgetsitedata');
Route::get('dttbldetailsrn', 'historicalController@rngetsitedata');


Route::get('hstry', 'historicalController@hstry');
Route::post('hstry/update', 'historicalController@showhstry');
Route::post('hstry/chart', 'ChartController@postChartProcess');

Route::get('hstrywlevel', 'historicalController@hstrywlevel');
Route::post('hstryelevel/update', 'historicalController@showhstry');
Route::post('hstrywlevel/chartlvl', 'ChartController@postChartProcessLevel');
Route::post('hstrywlevel/chartdsc', 'ChartController@postChartProcessDischarge');

Route::get('hstrycombo', 'historicalController@hstrycombo');
Route::post('hstrycombo/update', 'historicalController@showhstry');
Route::post('hstrycombo/chartrn', 'ChartController@postChartProcess');
Route::post('hstrycombo/chartlvl', 'ChartController@postChartProcessLevel');
Route::post('hstrycombo/chartdsc', 'ChartController@postChartProcessDischarge');


Route::get('tabs/{tabid}', 'TabController@getLaraTab');
//Route::get('/datatables/orders', array('auth', 'uses' => 'ProfileController@anyOrders'))->name('datatables.dataOrders');
//Route::get('/datatables/properties', array('uses' => 'ProfileController@anyProperties'))->name('datatables.dataProperties');