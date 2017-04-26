<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreBlogPostRequest extends Request
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
            'githubUserName' => 'alpha|required',
            'email' => 'email',
            'dob' => 'required',
            'gender' => 'required',
            'maritalStatus' => 'required',
            'employer' => 'required|max:255|alpha',
            'employment' => 'required|max:255|alpha',
            'communication' => 'required',
            'contactType' => 'required',
            'residentialState' => 'max:255|alpha',
            'residentialCity' => 'max:255|alpha',
            'residentialZip' => 'numeric|min:6',
            'officeState' => 'required|max:255|alpha',
            'officeCity' => 'required|max:255|alpha',
            'officeZip' => 'required|numeric|min:6',
            'contact' => 'required|min:11|numeric'
        ];
    }
}
