@extends('master')

@section('title', 'Tag manager')
@section('title-bar', trans('tags/langTag.editTitle'))
@section('body')
	@include('partials/navigation_bar')
	@section('nav-href','users')

	<div class="form-user container-fluid">
			<div class="form-group">
				<form action="{{ url('tags/'.$tags->id) }}" method="POST">
				@csrf
				{{method_field('put') }}

				<label for="">{{trans('tags/langTag.value')}}:</label>
				
				<input type="text" class="form-control"  name="value" value="{{ $tags->value }}" required="required">

				<br>

				<label for="devices_id">{{trans('tags/langTag.deviceName')}}:</label>
				<select name="devices_id" class="form-control" >
					@foreach(TagHelper::getOptionStatus() as $key => $value)
						<option value="{{$key}}">{{$value}}</option>
					@endforeach
				</select>
				<br>
					<div class="form-group">
					<button id="btn-form-user" class="btn btn-primary" type="sumbit" >{{trans('tags/langTag.submit')}}</button>
					{{-- <button id="submit" class="btn btn-success" type="sumbit" onclick="return confirm('{{trans('tags/langTag.confirmEdit')}}{{ $tags->value }}'); ">{{trans('tags/langTag.submit')}}</button> --}}
				</div>
				</form>
			</div>
	</div>
@endsection
