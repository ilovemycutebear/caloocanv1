@extends('masterdesign')
@section('content')

	<h1>All Rain values Here</h1>

	@foreach($siteinfo as $siteinfos)

		<div>
			<a href ="/raintips/{{ $siteinfos->id }}">{{$siteinfos->name}}</a>
		</div>





	@endforeach


@stop