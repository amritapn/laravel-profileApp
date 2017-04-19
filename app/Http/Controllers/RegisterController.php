<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Controllers\Controller;
use App\Model\Employee;
use App\Model\Company;
use App\Model\Designation;
use App\Model\State;
use App\Model\City;
use App\Model\Address;
use App\Model\CommunicationType;
use App\Model\Communication;
use App\Model\Contacts;
use App\Model\Services\RegisterInfo;
use App\Http\Requests\StoreValidationError;
use Session;
use Hash;

class RegisterController extends Controller
{
    /**
     * Show the form to create a new blog post.
     *
     * @return Response
     */
    public function index()
    {
        return view('register');
    }

    /**
     * Store a new blog post.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(StoreValidationError $request)
    {
        $photoLocation = null;
       $fileName = $request->ProfilePic;

       // Retrieve image File from the registration page
        if(isset($fileName)) {
            $file = $request->file('ProfilePic');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path().'/img/' ;
            $file->move($destinationPath,$fileName);
            $photoLocation = $fileName;
        } else {
            $photoLocation = "dummy.svg";
        }

        // Retrieve the communication type
        $communication = implode(",", $request->get('tags'));

        // Retrieve the contact type
        $contactType = implode(",", $request->get('value'));

        //Make the passwoird Encrypted
        $pass =  Hash::make($request->password);
        $value = array(
            'prefix' => $request->prefix,
            'firstName' => $request->firstName,
            'middleName' => $request->middleName,
            'lastName' => $request->lastName,
            'userName' => $request->userName,
            'password' => $pass,
            'gitName' => $request->githubUserName,
            'email' => $request->email,
            'dob' => $request->dateOfBirth,
            'marital' => $request->maritalStatus,
            'gender' => $request->gender,
            'employer' => $request->companyName,
            'employment' => $request->designationName,
            'communication' => $communication,
            'contactType' => $contactType,
            'contact' => $request->contactNumber,
            'resState' => $request->residenceStateName,
            'resCity' => $request->residenceCityName,
            'resZip' => $request->residenceZip,
            'ofcState' => $request->officeStateName,
            'ofcCity' => $request->officeCityName,
            'ofcZip' => $request->officeZip,
            'photoLocation' => $photoLocation);


        RegisterInfo::insertData($value);
        Session::flash('success','You have registered successfully!!');
        return redirect('show');

    }

    /**
     * Show the data
     * @param
     * @return Response
     */

    public function show(){
        return view('show');
    }
}