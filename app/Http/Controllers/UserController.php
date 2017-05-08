<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\Employee;
use App\Model\Company;
use App\Model\Designation;
use App\Model\State;
use App\Model\City;
use App\Model\Address;
use App\Model\CommunicationType;
use App\Model\Communication;
use App\Model\Contacts;
use App\Model\Services\GetUserInfo;
use App\Http\Requests\StoreBlogPostRequest;
use View;

class UserController extends Controller
{
    /**
     * Show the form to create a new blog post.
     * @param array
     * @return Response
     */

    public function view(Request $request)
    {
        $employeeId = $request->row_id;
        $employee = GetUserInfo::getDetails($employeeId);
        $address = $employee['ADDRESS'];
        $addressValue = explode(",", $address);
        $residential = $addressValue[0];
        $official = $addressValue[1];
        $residentialAddress = explode(":", $residential);
        $residentialAddressType = $residentialAddress[1];
        $value = explode(" ", $residentialAddressType);
        $residentialZip = $value[1];
        $residentialCityName = $value[2];
        $residentialStateName = $value[3];
        $officialAddress = explode(":", $official);
        $officeAddressValue = $officialAddress[1];
        $officeValue = explode(" ", $officeAddressValue);
        $officeZip = $officeValue[1];
        $officeCityName = $officeValue[2];
        $officeStateName = $officeValue[3];
        $array = array('PK_ID' => $employee['PK_ID'],
                    'prefix' => $employee['prefix'],
                    'firstName' => $employee['firstName'],
                    'middleName' => $employee['middleName'],
                    'lastName' => $employee['lastName'],
                    'username' => $employee['username'],
                    'gitName' => $employee['githubUsername'],
                    'email' => $employee['email'],
                    'dob' => $employee['dateOfBirth'],
                    'marital' => $employee['maritalStatus'],
                    'gender' => $employee['gender'],
                    'employer' => $employee['companyName'],
                    'employment' => $employee['name'],
                    'communication' => $employee['communicationType'],
                    'contactType' => $employee['contactType'],
                    'contact' => $employee['contactNumber'],
                    'resState' => $residentialStateName,
                    'resCity' => $residentialCityName,
                    'resZip' => $residentialZip,
                    'ofcState' => $officeStateName,
                    'ofcCity' => $officeCityName,
                    'ofcZip' => $officeZip

            );
        return response()->json($array);
    }

    /**
     * Show the error in the laravel
     * @param array
     * @return Response
     */

    public function update(StoreBlogPostRequest $request)
    {
        $value = array('PK_ID' =>$request->row_id,
            'prefix' => $request->prefix,
            'firstName' => $request->firstName,
            'middleName' => $request->middleName,
            'lastName' => $request->lastName,
            'username' => $request->username,
            'gitName' => $request->githubUserName,
            'email' => $request->email,
            'dob' => $request->dob,
            'marital' => $request->maritalStatus,
            'gender' => $request->gender,
            'employer' => $request->employer,
            'employment' => $request->employment,
            'communication' => $request->communication,
            'contactType' => $request->contactType,
            'contact' => $request->contact,
            'residenceState' => $request->residentialState,
            'residenceCity' => $request->residentialCity,
            'residenceZip' => $request->residentialZip,
            'officeState' => $request->officeState,
            'officeCity' => $request->officeCity,
            'officeZip' => $request->officeZip);
        GetUserInfo::updateData($value);

    }

    /**
     * Delete the employee record from the database
     * @param array
     * @return Response
     */

    public static function deleterow(Request $request)
    {
        $empId = $request->row_id;
        return GetUserInfo::deletedata($empId);

    }

    /**
     * retrieve the data  from the gitHub API
     * @param array
     * @return Response
     */

    public static function gitdata(Request $request)
    {
        $employeeId = $request->empId;
        return GetUserInfo::getUsername($employeeId);
    }
}
