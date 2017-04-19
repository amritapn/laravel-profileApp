@extends('layouts.master')
@section('title', 'Page Title')
@section('content')
 @if(Session::has('success'))
     <div class="alert alert-success role='alert'">
         <strong>Success:</strong>
         {{Session::get('success')}}
     </div>
    @endif
 <div class="row">
     <div class="col-md-5"></div>
     <div class="col-md-7">
         <h3><u><a href="login">LogIn</a></u></h3>
     </div>
 </div>
@endsection