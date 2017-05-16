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

class DashboardInfo
{
    /**
     * Get offers related to tag or category
     *
     * @param
     *
     * @return array
     */
    public static function getData()
    {
        // Fetch column value from different table
        return Employee::select(
            'employee.PK_ID',
            'employee.prefix',
            'employee.firstName',
            'employee.middleName',
            'employee.photoLocation',
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
            ->groupBy('employee.PK_ID')
            ->join('address', 'employee.PK_ID', '=', 'address.FK_employeeID')
            ->join('city', 'address.FK_cityId', '=', 'city.PK_ID')
            ->join('state', 'city.FK_stateID', '=', 'state.PK_ID')
            ->join('company', 'employee.FK_companyID', '=', 'company.PK_ID')
            ->join('designation', 'employee.FK_designationID', '=', 'designation.PK_ID')
            ->join('contacts', 'employee.PK_ID', '=', 'contacts.FK_employeeID')
            ->join('communication', 'employee.PK_ID', '=', 'communication.FK_employeeID')
            ->join('communicationType', 'communication.FK_communicationTypeID', '=', 'communicationType.PK_ID')
            ->get();

    }
}
