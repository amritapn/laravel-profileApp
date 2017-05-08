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

class GetUserInfo
{
    /**
     * Get offers related to tag or category
     *
     * @param integer
     * @param $empId
     *
     * @return array
     */
    public static function getDetails($empId)
    {
            return Employee::select(
                'employee.PK_ID',
                'employee.prefix',
                'employee.firstName',
                'employee.middleName',
                'employee.lastName',
                'employee.username',
                'employee.email',
                'employee.githubUsername',
                'employee.dateOfBirth',
                'employee.gender',
                'employee.maritalStatus',
                DB::raw(
                    'GROUP_CONCAT(address.addressType, ": ", 
                     CONCAT_WS(" ", address.zip, city.name, state.stateName)) AS ADDRESS'
                ),
                'company.name AS companyName',
                'designation.name',
                DB::raw(
                    'GROUP_CONCAT(DISTINCT communicationType.communicationType) AS communicationType'
                ),
                DB::raw(
                    'GROUP_CONCAT(DISTINCT contacts.contactType) AS contactType'
                ),
                'contacts.contactNumber'
            )
                ->where('employee.PK_ID', $empId)
                ->join('address', 'employee.PK_ID', '=', 'address.FK_employeeID')
                ->join('city', 'address.FK_cityId', '=', 'city.PK_ID')
                ->join('state', 'city.FK_stateID', '=', 'state.PK_ID')
                ->join('company', 'employee.FK_companyID', '=', 'company.PK_ID')
                ->join('designation', 'employee.FK_designationID', '=', 'designation.PK_ID')
                ->join('contacts', 'employee.PK_ID', '=', 'contacts.FK_employeeID')
                ->join('communication', 'employee.PK_ID', '=', 'communication.FK_employeeID')
                ->join('communicationType', 'communication.FK_communicationTypeID', '=', 'communicationType.PK_ID')
                ->first();

    }

    /**
     * Get offers related to tag or category
     *
     * @param array of values
     * @param $value
     *
     * @return array
     */

    public static function updateData($value)
    {
        $empId = $value['PK_ID'];
        $fkId = Employee::select('FK_companyID', 'FK_designationID')
            ->where('PK_ID', '=', $empId)
            ->first();

        // Retrieving the value
        $companyId = $fkId['FK_companyID'];
        $designationId = $fkId['FK_designationID'];

        //Updating data to the employee table
        Employee::where('PK_ID', $empId)
            ->update(
                [
                    'prefix' => $value['prefix'],
                    'firstName' => $value['firstName'],
                    'middleName' => $value['middleName'],
                    'lastName' => $value['lastName'],
                    'username' => $value['username'],
                    'githubUsername' => $value['gitName'],
                    'email' => $value['email'],
                    'dateOfBirth' => $value['dob'],
                    'maritalStatus' => $value['marital'],
                    'gender' => $value['gender']
                ]
            );


        //Updating company table
        Company::where('PK_ID', $companyId)
            ->update(['name' => $value['employer']]);

        //Updating Designation table
        Designation::where('PK_ID', $designationId)
            ->update(['name' => $value['employment']]);

        //making the communicationType and contatType to String

        //Retrieving the communication id
        $typeId = Communication::select('FK_communicationTypeID')
            ->where('FK_employeeID', '=', $empId)
            ->first();
        $commId = $typeId['FK_communicationTypeID'];

        //Update the communicationType table
        CommunicationType::where('PK_ID', $commId)
            ->update(['communicationType' => $value['communication']]);

        //Update the contacts table
        Contacts::where('FK_employeeID', $empId)
            ->update(['contactType' => $value['contactType'], 'contactNumber' => $value['contact']]);

        //Retrieve the employee id from the address field
        $data = Address::select('FK_cityID')
            ->where('FK_employeeID', '=', $empId)
            ->first();
        $cityId = $data['FK_cityID'];
        $val = City::select('FK_stateID')
            ->where('PK_ID', '=', $cityId)
            ->first();
        $stateId = $val['FK_stateID'];

        //Update the address table
        Address::where('FK_employeeID', $empId)
            ->update(['zip' => $value['residenceZip'], 'FK_cityID' => $cityId, 'addressType' => 'residential']);

        //Update to the city table
        City::where('PK_ID', $cityId)
            ->update(['name' => $value['residenceCity']]);

        //Update the state table
        State::where('PK_ID', $stateId)
            ->update(['stateName' => $value['residenceState']]);

        //Update the officeaddress table
        Address::where('FK_employeeID', $empId)
            ->update(['zip' => $value['officeZip'], 'FK_cityID' => $cityId, 'addressType' => 'official']);

        //Update to the officecity table
        City::where('PK_ID', $cityId)
            ->update(['name' => $value['officeCity']]);

        //Update the officestate table
        State::where('PK_ID', $stateId)
            ->update(['stateName' => $value['officeState']]);
    }

    /**
     * Get offers related to tag or category
     *
     * @param integer
     * @param $primiaryId
     *
     * @return array
     */

    public static function deletedata($primiaryId)
    {
        Employee::destroy($primiaryId);
        return $primiaryId;
    }

    /**
     * Get offers related to tag or category
     *
     * @param integer
     * @param $employeeId
     *
     * @return githubUserName
     */

    public static function getUsername($employeeId)
    {
        $name = Employee::select('githubUserName')
            ->where('PK_ID', '=', $employeeId)
            ->first();
        return $name['githubUserName'];
    }
}
