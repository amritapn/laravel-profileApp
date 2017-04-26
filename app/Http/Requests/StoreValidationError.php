<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreValidationError extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'prefix' => 'required',
            'firstName' => 'required|max:255|alpha',
            'middleName' => 'max:255|alpha',
            'lastName' => 'required|max:255|alpha',
            'username' => 'required|max:255',
            'password' => 'required|min:4',
            'confirmPassword' => 'required|min:4|same:password',
            'githubUserName' => 'alpha',
            'email' => 'email',
            'dateOfBirth' => 'required',
            'gender' => 'required',
            'maritalStatus' => 'required',
            'companyName' => 'required|max:255|alpha',
            'designationName' => 'required|max:255|alpha',
            'tags' => 'required',
            'value' => 'required',
            'residenceStateName' => 'max:255|alpha',
            'residenceCityName' => 'max:255|alpha',
            'residenceZip' => 'numeric|min:6',
            'officeStateName' => 'required|max:255|alpha',
            'officeCityName' => 'required|max:255|alpha',
            'officeZip' => 'required|numeric|min:6',
            'contactNumber' => 'required|numeric',


        ];
    }
}
