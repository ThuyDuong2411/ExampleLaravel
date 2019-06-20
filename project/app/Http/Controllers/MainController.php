<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;


class MainController extends Controller
{
    function indexlogin()
    {
        return view('login');
    }
    function indexregister()
    {
        return view('register');
    }
    function indexadmin_register()
    {
        return view('admin_add_account');
    }
    function checklogin(Request $request)
    {
        $this->validate($request,['email' => 'required|string','password' => 'required|string']);
        $user_data = array('email' => $request->get('email'),'password' => $request->get('password'),'role'=>'user');
        $admin_data = array('email' => $request->get('email'),'password' => $request->get('password'),'role'=>'admin');
        if(Auth::attempt($user_data))
        {
            return redirect('user/successloginuser');
        }
        else if(Auth::attempt($admin_data))
        {
            return redirect('admin/successloginadmin');
        }
        else
        {
            return back()->with('error', 'Wrong Login Details');
        }
    }
    function create_account_user(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|alpha',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'user';
        $user->save();
        $user_data = array('email' => $request->get('email'),'password' => $request->get('password'),'role'=>'user');
        if(Auth::attempt($user_data))
        {
            return redirect('user/successloginuser');
        }
    }
    function admin_create_account(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|alpha',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
            'role' => 'required|string|alpha',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();
        return back()->with('error', 'Add account successfully.');
    }
    function successloginuser()
    {
        return view('successloginuser');
    }
    function successloginadmin()
    {
        return view('successloginadmin');
    }
    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
