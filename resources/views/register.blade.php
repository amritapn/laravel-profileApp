@extends('layouts.master')
@section('title', 'Page Title')
@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-3">
                <header>
                    <h2><u>Registration</u></h2>
                </header>
            </div>
        </div>
    </div>
    {!! Form::open(['url' => 'register', 'name' => 'registration', 'files' => true]) !!}
    <div class="container">
        <div class="row">
            <div class="container col-md-4">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                        {!! Form::label('prefix', 'Prefix') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                        {!! Form::select('prefix', ['Mr' => 'Mr', 'Mrs' => 'Mrs', 'Miss' => 'Miss'], null,
                                        array('class' => 'form-control')) !!}
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                        {!! Form::label('firstName', 'First Name') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                        {!! Form::text('firstName',null,
                                        array('class' => 'form-control',
                                              'placeholder' => 'First Name',
                                              'id' => 'firstName')) !!}
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                        {!! Form::label('middleName', 'Middle Name') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                        {!! Form::text('middleName', null,
                                        array('class' => 'form-control',
                                              'placeholder' => 'Middle Name',
                                              'id' => 'middleName')) !!}
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                        {!! Form::label('lastName', 'Last Name') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                        {!! Form::text('lastName', null,
                                        array('class' => 'form-control',
                                               'placeholder' => 'Last Name',
                                               'id' => 'lastName')) !!}
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                        {!! Form::label('username', 'Username') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                        {!! Form::text('username', null,
                                        array('class' => 'form-control',
                                              'placeholder' => 'Username',
                                              'id' => 'userName')) !!}
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                        {!! Form::label('password', 'Password') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                        {!! Form::password('password', array('class' => 'awesome, form-control',
                                                              'placeholder' => 'Password',
                                                               'id' => 'password')) !!}
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                        {!! Form::label('confirmPassword', 'Confirm Password') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                        {!! Form::password('confirmPassword',
                                            array('class' => 'awesome, form-control',
                                                  'placeholder' => 'Confirm Password')) !!}
                    </div>
                </div>
            </div>
            <div class="container col-md-4">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                        {!! Form::label('githubUserName', 'Github Username') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                        {!! Form::text('githubUserName', null,
                                        array('class' => 'form-control',
                                              'placeholder' => 'Github Username',
                                              'id' => 'gitName')) !!}
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                        {!! Form::label('email', 'Email') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                        {!! Form::email('email', null,
                                        array('class' => 'awesome, form-control',
                                              'placeholder' => 'E-mail',
                                              'id' => 'email')) !!}
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                        {!! Form::label('dateOfBirth', 'Date Of Birth') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                        {!! Form::date('dateOfBirth', \Carbon\Carbon::now(),
                                        array('class' => 'form-control',
                                              'id' => 'dob')) !!}
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                        {!! Form::label('gender', 'Gender') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                        {!! Form::select('gender', ['Male' => 'Male', 'Female' => 'Female'], null,
                                          array('class' => 'form-control', 'id' => 'gender')) !!}
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                        {!! Form::label('maritalStatus', 'Marital Status') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                        {!! Form::select('maritalStatus', ['Married' => 'Married', 'Unmarried' => 'Unmarried'], null,
                                          array('class' => 'form-control', 'id' => 'maritalStatus')) !!}
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                        {!! Form::label('companyName', 'Employer') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                        {!! Form::text('companyName', null,
                                        array('class' => 'form-control',
                                              'placeholder' => 'Employer',
                                               'id' => 'employer')) !!}
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                        {!! Form::label('designationName', 'Employment') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                        {!! Form::text('designationName', null,
                                       array('class' => 'form-control',
                                             'placeholder' => 'Employment',
                                             'id' => 'employment')) !!}
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-6">
                        {!! Form::label('communicationType', 'Communication Type') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-6">
                        {!! Form::checkbox('tags[]','Email', array('id'=>'comm'))!!}
                        {!! Form::label('Email') !!}
                        {!! Form::checkbox('tags[]','Sms', array('id'=>'comm'))!!}
                        {!! Form::label('Sms') !!}
                        {!! Form::checkbox('tags[]','Phone', array('id'=>'comm'))!!}
                        {!! Form::label('Phone') !!}
                    </div>
                </div><br>
            </div>
            <div class="container col-md-4">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-6">
                        {!! Form::label('Address', 'Address') !!}
                    </div>
                </div>
                <div class="well col-md-12">
                    <div class="col-md-5">
                        <h5><b>Official Address</b></h5>
                        <div class="row">
                            <div class="col-md-6">
                                {!! Form::label('officeStateName', 'State') !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::text('officeStateName', null,
                                          array('class' => 'form-control',
                                                'placeholder' => 'State',
                                                'id' => 'officeState')) !!}
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-6">
                                {!! Form::label('officeCityName', 'City') !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::text('officeCityName', null,
                                               array('class' => 'form-control',
                                                     'placeholder' => 'City',
                                                      'id' => 'officeCity')) !!}
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-6">
                                {!! Form::label('offieZip', 'Zip') !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::text('officeZip', null,
                                               array('class' => 'form-control',
                                                     'placeholder' => 'Zip',
                                                     'id' => 'officeZip')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5><b>Residential Address</b></h5>
                        <div class="row">
                            <div class="col-md-6">
                                {!! Form::label('residenceStateName', 'State') !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::text('residenceStateName', null,
                                                array('class' => 'form-control',
                                                      'placeholder' => 'State',
                                                      'id' => 'residentialState')) !!}
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-6">
                                {!! Form::label('residenceCityName', 'City') !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::text('residenceCityName', null,
                                                array('class' => 'form-control',
                                                      'placeholder' => 'City',
                                                      'id' => 'residentialCity')) !!}
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-6">
                                {!! Form::label('residenceZip', 'Zip') !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::text('residenceZip', null,
                                            array('class' => 'form-control',
                                                  'placeholder' => 'Zip',
                                                  'id' => 'residentialZip')) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::label('contactType', 'Contact Type') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::checkbox('value[]','mobile', array('id'=>'contactType'))!!}
                        {!! Form::label('Mobile') !!}
                        {!! Form::checkbox('value[]','landline', array('id'=>'contactType'))!!}
                        {!! Form::label('Landline') !!}
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::label('contactNumber', 'Contact Number') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::text('contactNumber', null,
                                       array('class' => 'form-control',
                                             'placeholder' => 'Contact Number',
                                              'id' => 'contact')) !!}
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::label('ProfilePic', 'Profile Picture') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::file('ProfilePic') !!}
                    </div>
                </div>
            </div>
        </div>
    </div><br>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-3">
    {!! Form::submit('submit', array('class'=>'btn btn-success btn-block', 'id' => 'signUp'))!!}
 </div>
</div>
</div>
{!! Form::close() !!}
@endsection
@section('jquery')
    {!! Html::script("https://code.jquery.com/jquery-1.11.3.js")  !!}
    {{ Html::style("https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css") }}
    {!! Html::script("https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js") !!}
    {{ Html::style('css/UpdateError.css') }}
    {{ Html::script('js/view.js') }}
  @endsection
@section('js-css')
{!! Html::script("https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js") !!}
{{ Html::style('css/Jserror.css') }}
@endsection