<?php

namespace App\Http\Controllers;

use App\Model\Services\DashboardInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
use Session;

use View;
class DashboardController extends Controller
{
    /**
     * Show the data in the dashboard page
     * @param
     * @return Response
     */

    public function index()
    {

        if (Session::has('loggedIn')) {
            $data = DashboardInfo::getData();

            //This will return all the retrived data to the database
            return View::make('dashboard', compact('data'));

        } else {
            return redirect('login');
        }
    }

    /**
     * Show the form to create a new blog post.
     * @param
     * @return Response
     */

    public function logout()
    {
         if (Session::has('loggedIn')) {
             Session::flush();
             return redirect('login');
         }
    }

}

