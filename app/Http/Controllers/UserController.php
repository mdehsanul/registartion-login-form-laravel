<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //registration
    function showRegistrationform()
    {
        return view('registrationform');
    }

    //login
    function showLoginform()
    {
        return view('loginform');
    }

    //registration
    function getRegistrationData(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'telephone' => 'required',
            'email' => 'required | unique:users',
            'password' => 'required',
            'cpassword' => 'required',
            'image' => 'required'
        ]);
        $user = new User(); // model name
        $user->name = $request->name;
        $user->telephone = $request->telephone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->cpassword = $request->cpassword;
        $user->image = $request->image;
        $req = $user->save();
        if ($req) {
            return back()->with('success', 'You have registered successfully');
        } else {
            return back()->with('fail', 'Something Wrong');
        }
    }

    //login
    function getloginData(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $user =  User::where('email', '=', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId', $user->id);
                return redirect('dashboard');
            } else {
                return back()->with('fail', 'password not match');
            }
        } else {
            return back()->with('fail', 'email is not registered');
        }
    }

    //dashboard
    function dashboard(Request $request)
    {
        $loginUserdata = array();
        if (session()->has('loginId')) {
            $loginUserdata = User::where('id', '=', session()->get('loginId'))->first();
        }
        return view('dashboard', compact('loginUserdata'));
    }

    //logout
    function logout()
    {
        if (session()->has('loginId')) {
            session()->pull('loginId'); // pull is the function for forgot
            return redirect('loginform');
        }
    }
    //showing update form
    function updateform($id)
    {
        $data = User::find($id);
        return view('updateform', ['data' => $data]);
    }


    //update
    function update(Request $request)
    {
        $user = User::find($request->id); // model name
        $user->name = $request->name;
        $user->telephone = $request->telephone;
        $user->password = Hash::make($request->password);
        $user->cpassword = $request->cpassword;
        $user->image = $request->image;
        $req = $user->save();
        return redirect('dashboard');
    }
}
