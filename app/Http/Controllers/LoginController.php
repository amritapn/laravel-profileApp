<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Employee;
use Illuminate\Support\Facades\Auth;

use App\User;
use Session;
use Log;

class LoginController extends Controller
{
    /**
     * Get offers related to tag or category
     *
     * @param
     * @param
     *
     * @return response
     */

    public function login()
    {
        if (Session::has('loggedIn')) {
            return redirect('dashboard');
        } else {
            Log::critical("error");
            return view('login');
        }
    }
    /**
     * Get offers related to tag or category
     *
     * @param array
     * @param
     *
     * @return array
     */

    public function loginProcess(Request $request)
    {

        if (Session::has('loggedIn')) {
            return view('dashboard');
        } else {
            $username = $request->username;
            $password = $request->password;

            if (Auth::attempt(array('username' => $username, 'password' => $password))) {
                Session::put('loggedIn', 'Authenticate');
                return redirect('dashboard');
            } else {
                Session::flash('success', 'Wrong Credentials');
                return redirect('login');
            }
        }
    }
}
