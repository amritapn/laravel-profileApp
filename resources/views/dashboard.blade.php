@extends('layouts.master')
@section('title', 'Page Title')
@section('content')
    {!! Form::open(array('url' => 'dashboard', 'method' => 'get')) !!}
        <div class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-form navbar-right">
                    <a href="{{ url('logout') }}" class="btn btn-primary btn-block">Logout</a>

                </div>
            </div>
        </div>
    {!! Form::close() !!}
    <div class="container table-responsive">
        <div class="row">
            <table class="table table-bordered" id = "user_table">
                <thead class="thead">
                <tr>
                    <td>Image</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Gituser Name</td>
                    <td>DOB</td>
                    <td>Address</td>
                    <td>Company</td>
                    <td>Designation</td>
                    <td>Communication Type</td>
                    <td>Contact</td>
                    <td> Action</td>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $key => $row)
                        <tr id={{$row->PK_ID}} >
                            <td><img src = "/img/{{$row->photoLocation}}" class="image"></td>
                            <td>{{$row->prefix}}. {{$row->firstName}} {{$row->middleName}} {{$row->lastName}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->githubUsername}}</td>
                            <td>{{$row->dateOfBirth}}</td>
                            <td>{{$row->ADDRESS}}</td>
                            <td>{{$row->companyName}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->communicationType}}</td>
                            <td>{{$row->contactNumber}}</td>
                            <td><button class="edit_button btn btn-success btn-xs" data-toggle="modal"
                                        data-target="#registrationModal" value="{{$row->PK_ID}}">
                                        <i class="fa fa-edit"></i></button>
                                <button class="delete_button btn btn-danger btn-xs" data-toggle="modal"
                                        data-target="#deleteModal" value="{{$row->PK_ID}}">
                                        <i class="fa fa-trash"></i></button><br>
                                <button class="view_button btn btn-primary btn-xs"  data-toggle="modal"
                                        data-target="#registrationModal" value="{{$row->PK_ID}}">
                                        <i class="fa fa-address-book"></i></button>
                            <button  class="gitButton btn btn-info btn-xs" data-toggle="modal" data-target="#myModal1"
                                     value="{{$row->PK_ID}}"><i class="fa fa-github-alt" aria-hidden="true">
                                        </i></button>
                        </tr>
                @endforeach
            </table>
        </div>
    </div>
    <!-----Modal ------>
    <div class="modal fade " id="registrationModal" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content ">
                <div class="modal-header ">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Profile</h4>
                </div>
                    <div class="error">
                    </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-4">
                                <header>
                                    <h2><u>Registration</u></h2>
                                </header>
                            </div>
                        </div>
                    </div>
                    {!! Form::open(['url' => 'register', 'name' => 'registration']) !!}
                    <div class="container">
                        <div class="row">
                            <div class="container col-md-3">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-9">
                                        {!! Form::label('prefix', 'Prefix') !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-9">
                                        {!! Form::select('prefix', ['Mr' => 'Mr', 'Mrs' => 'Mrs', 'Miss' => 'Miss'],
                                         null, array('class' => 'form-control', 'id' => 'prefix')) !!}
                                        <div class="prefix text-danger"></div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-9">
                                        {!! Form::label('firstName', 'First Name') !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-9">
                                        {!! Form::text('firstName',null,
                                         array('class' => 'form-control',
                                                'placeholder' => 'First Name',
                                                'id' => 'firstName')) !!}
                                        <div class="firstName text-danger"></div>
                                    </div>
                                </div><br>

                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-9">
                                        {!! Form::label('middleName', 'Middle Name') !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-9">
                                        {!! Form::text('middleName', null,
                                         array('class' => 'form-control',
                                               'placeholder' => 'Middle Name',
                                               'id' => 'middleName')) !!}
                                        <div class="middleName text-danger"></div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-9">
                                        {!! Form::label('lastName', 'Last Name') !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-9">
                                        {!! Form::text('lastName', null,
                                           array('class' => 'form-control',
                                                 'placeholder' => 'Last Name',
                                                 'id' => 'lastName')) !!}
                                        <div class="lastName text-danger"></div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-9">
                                        {!! Form::label('username', 'Username') !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-9">
                                        {!! Form::text('username', null,
                                             array('class' => 'form-control',
                                                   'placeholder' => 'Username',
                                                   'id' => 'username')) !!}
                                        <div class="userName text-danger"></div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-9">
                                        {!! Form::label('githubUserName', 'Github Username') !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-9">
                                        {!! Form::text('githubUserName', null,
                                             array('class' => 'form-control',
                                                   'placeholder' => 'Github Username',
                                                   'id' => 'gitName')) !!}
                                        <div class="gitName text-danger"></div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-9">
                                        {!! Form::label('email', 'Email') !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-9">
                                        {!! Form::email('email', null,
                                                  array('class' => 'awesome,
                                                        form-control',
                                                        'placeholder' => 'Email',
                                                        'id' => 'email')) !!}
                                        <div class="email text-danger"></div>
                                    </div>
                                </div><br>
                            </div>
                            <div class="container col-md-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        {!! Form::label('dateOfBirth', 'Date Of Birth') !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        {!! Form::date('dateOfBirth', \Carbon\Carbon::now(),
                                                      array('class' => 'form-control', 'id' => 'dob')) !!}
                                        <div class="dob text-danger"></div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        {!! Form::label('gender', 'Gender') !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        {!! Form::select('gender', ['Male' => 'Male', 'Female' => 'Female'], null,
                                                         array('class' => 'form-control', 'id' => 'gender')) !!}
                                        <div class="gender text-danger"></div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        {!! Form::label('maritalStatus', 'Marital Status') !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        {!! Form::select('maritalStatus', ['Married' => 'Married',
                                                                            'Unmarried' => 'Unmarried'], null,
                                                                             array('class' => 'form-control',
                                                                             'id' => 'maritalStatus')) !!}
                                        <div class="maritalStatus text-danger"></div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        {!! Form::label('name', 'Employer') !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        {!! Form::text('companyName', null,
                                                      array('class' => 'form-control',
                                                            'placeholder' => 'Employer',
                                                             'id' => 'employer')) !!}
                                        <div class="employer text-danger"></div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        {!! Form::label('designationName', 'Employment') !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        {!! Form::text('designationName', null,
                                                        array('class' => 'form-control',
                                                               'placeholder' => 'Employment',
                                                               'id' => 'employment')) !!}
                                        <div class="employment text-danger"></div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-9">
                                        {!! Form::label('communicationType', 'Communication Type') !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        {!! Form::checkbox('tags[]','Email', array('id'=>'comm'))!!}
                                        {!! Form::label('Email') !!}
                                        {!! Form::checkbox('tags[]','Sms', array('id'=>'comm'))!!}
                                        {!! Form::label('Sms') !!}
                                        {!! Form::checkbox('tags[]','Phone', array('id'=>'comm'))!!}
                                        {!! Form::label('Phone') !!}
                                        <div class="comm text-danger"></div>
                                    </div>
                                </div><br>

                                <div class="row">
                                    <div class="col-md-6">
                                        {!! Form::label('contactType', 'ContactType') !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        {!! Form::checkbox('value[]','mobile', array('id'=>'contactType'))!!}
                                        {!! Form::label('Mobile') !!}
                                        {!! Form::checkbox('value[]','landline', array('id'=>'contactType'))!!}
                                        {!! Form::label('Landline') !!}
                                        <div class="contactType text-danger"></div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-9">
                                        {!! Form::submit('Submit',
                                                        array('class'=>'btn btn-success btn-block update_btn', '
                                                                id'=>'submit'))!!}
                                    </div>
                                </div>
                            </div>
                            <div class="container col-md-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        {!! Form::label('Address', 'Address') !!}
                                    </div>
                                </div>
                                <div class="well col-md-9">
                                    <div class="col-md-6">
                                        <h4>Official Address</h4>
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
                                                <div class="officeState text-danger"></div>
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
                                                <div class="officeCity text-danger"></div>
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
                                                <div class="officeZip text-danger"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h4>Residential Address</h4>
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
                                                <div class="residentialState text-danger"></div>
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
                                                <div class="residentialCity text-danger"></div>
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
                                                <div class="residentialZip text-danger"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1"></div>
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
                                        <div class="contact text-danger"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <input type ="hidden" id="hidden">
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div id="deleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>

                <div class="modal-body">
                    <p>Are you sure to delete this record?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal" >Cancel</button>
                    <button type="button" class="delete btn btn-danger" data-dismiss="modal">Delete</button>
                </div>
                <input type ="hidden" id="hidden">
            </div>

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal1" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">GITHUB details</h4>
                </div>
                <div class="modal-body">
                    <img id="my_image" src="" width="50" height="50"/>
                    <p id="gitdetails"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('jquery')
    {!! Html::script("https://code.jquery.com/jquery-1.11.3.js")  !!}
    {{ Html::style("https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css") }}
    {!! Html::script("https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js") !!}
    {{ Html::script('js/formValidation.js') }}
@endsection
@section('js-css')
    {!! Html::script("https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js") !!}
    {{ Html::style('css/Jserror.css') }}
    {{ Html::style('css/UpdateError.css') }}
    {{ Html::script('js/view.js') }}
    {{ Html::script('js/git.js') }}
@endsection