@extends('layouts.master')
@section('title', 'Page Title')
    {{ Html::style('css/style.css') }}
@section('content')
    @if(Session::has('success'))
        <div class="alert alert-danger role='alert'">
            {{Session::get('success')}}
        </div>
    @endif
    {!! Form::open(array('url' => 'login', 'method' => 'post')) !!}
        <div class="row">
            <div class=" col-lg-4"></div>
            <div class="login-wrap col-lg-4">
                <div class="form form-group">
                        <h2><u>LogIn</u></h2><br><br>
                    {!! Form::text('username', null, array('class' => 'form-control', 'placeholder' => 'Username')) !!}
                        </div>
                        <div class="form-group" >

                            {!! Form::password('password', array('class' => 'awesome, form-control',
                                                                  'placeholder' => 'Password')) !!}
                        </div>
                {!! Form::submit('Login', array('class'=>'btn btn-primary btn-block'))!!}
                <br>
                <button type="button" class="btn btn-success btn-block"
                                      onclick="window.location='{{ url("register") }}'">Signup</button>
                <br>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@endsection
