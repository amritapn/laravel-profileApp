<?php
namespace App\Model\Services;

use DB;
use App\Model\Employee;
use App\Model\Company;
use App\Model\Designation;
use App\Model\State;
use App\Model\City;
use App\Model\Address;
use App\Model\CommunicationType;
use App\Model\Communication;
use App\Model\Contacts;

class RegisterInfo
{
    /**
     * Get offers related to tag or category
     *
     * @param integer
     * @param array
     * @param array
     *
     * @return array
     */

    public static function InsertData($value)
    {
        $prefix = $value['prefix'];
        $firstName = $value['firstName'];
        $middleName = $value['middleName'];
        $lastName = $value['lastName'];
        $username = $value['username'];
        $password = $value['password'];
        $gitName = $value['gitName'];
        $email = $value['email'];
        $dob = $value['dob'];
        $marital = $value['marital'];
        $gender = $value['gender'];
        $employer = $value['employer'];
        $employment = $value['employment'];
        $communication = $value['communication'];
        $contactType = $value['contactType'];
        $contact = $value['contact'];
        $residenceState = $value['residenceState'];
        $residenceCity = $value['residenceCity'];
        $residenceZip = $value['residenceZip'];
        $officeState = $value['officeState'];
        $officeCity = $value['officeState'];
        $officeZip = $value['officeZip'];
        $photoLocation = $value['photoLocation'];

        // Check the company name is present in the company table and insert into company table
        $company = new Company;
        $id = Company::where('name', $employer)->pluck('PK_ID');

        if (count($id) > 0) {
            $companyId = $id[0];
        } else {
            $company->name = $employer;
            $company->save();
            $companyId = $company->PK_ID;
        }

        // Check the designation name is present in the company table and insert into designation table
        $designation = new Designation;
        $id = Designation::where('name', $employment)->pluck('PK_ID');

        if (count($id) > 0) {
            $designationId = $id[0];
        } else {
            $designation->name = $employment;
            $designation->save();
            $designationId = $designation->PK_ID;
        }

        //Insert into employee table
        $emp = new Employee;
        $emp->prefix = $prefix;
        $emp->firstName = $firstName;
        $emp->middleName = $middleName;
        $emp->lastName = $lastName;
        $emp->userName = $username;
        $emp->password = $password;
        $emp->email = $email;
        $emp->dateOfBirth = $dob;
        $emp->gender = $gender;
        $emp->maritalStatus = $marital;
        $emp->githubUserName = $gitName;
        $emp->photoLocation = $photoLocation;
        $emp->FK_companyID = $companyId;
        $emp->FK_designationID = $designationId;
        $emp->save();
        $employeeId = $emp->PK_ID;

        //Insert Residential address
        $state = new State;
        $pkId = State::where('stateName', $residenceState)->pluck('PK_ID');

        if (count($pkId) > 0) {
            $stateId = $pkId[0];
        } else {
            $state->stateName = $residenceState;
            $state->save();
            $stateId = $state->PK_ID;
        }

        $city = new City;
        $pkId = City::where('FK_stateID', $stateId)->pluck('PK_ID');

        if (count($pkId) > 0) {
            $cityId = $pkId[0];
        } else {
            $city->name = $residenceCity;
            $city->FK_stateID = $stateId;
            $city->save();
            $cityId = $city->PK_ID;
        }

        //Insert into address table
        $address = new Address;
        $address->FK_employeeID = $employeeId;
        $address->FK_cityID = $cityId;
        $address->addressType = 'residential';
        $address->zip = $residenceZip;
        $address->save();

        //Insert Official address
        $state = new State;
        $pkId = State::where('stateName', $officeState)->pluck('PK_ID');

        if (count($pkId) > 0) {
            $stateId = $pkId[0];
        } else {
            $state->stateName = $officeState;
            $state->save();
            $stateId = $state->PK_ID;
        }

        $city = new City;
        $pkId = City::where('FK_stateID', $stateId)->pluck('PK_ID');

        if (count($pkId) > 0) {
            $cityId = $pkId[0];
        } else {
            $city->name = $officeCity;
            $city->FK_stateID = $stateId;
            $city->save();
            $cityId = $city->PK_ID;
        }

        //Insert into address table
        $address = new Address;
        $address->FK_employeeID = $employeeId;
        $address->FK_cityID = $cityId;
        $address->addressType = 'official';
        $address->zip = $officeZip;
        $address->save();

        //Insert into communicationType table
        $comm = new CommunicationType;
        $id = CommunicationType::where('communicationType', $communication)->pluck('PK_ID');

        if (count($id) > 0) {
            $communicationId = $id[0];
        } else {
            $comm->communicationType = $communication;
            $comm->save();
            $communicationId = $comm->PK_ID;
        }

        //Insert into communication table
        $communication = new Communication();
        $communication->FK_employeeID = $employeeId;
        $communication->FK_communicationTypeID = $communicationId;
        $communication->save();

        //Insert into contacts table
        $contacts = new Contacts;
        $contacts->FK_employeeID = $employeeId;
        $contacts->contactType = $contactType;
        $contacts->contactNo = $contact;
        $contacts->save();
    }
}
