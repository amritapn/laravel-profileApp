@extends('layouts.master')
@section('title', 'Page Title')
@section('sidebar')
@parent
	<p>This is appended to the master sidebar.</p>
@endsection
@section('content')
	<p>This is my body content.</p>
{!! Form::open(['url' => 'foo/bar']) !!}
	{!! Form::label('email', 'E-Mail Address')!!}
	{!! Form::text('username')!!}
	{!! Form::text('email', 'example@gmail.com')!!}<br>
	{!! Form::password('password', ['class' => 'awesome'])!!}
{!! Form::close() !!}
@endsection
