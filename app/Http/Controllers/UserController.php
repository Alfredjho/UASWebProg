<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Hash;

class UserController extends Controller
{
    //

    public function showAllUsers(){
        $users = User::all();

        return view('accountMaintenance', ['user' => $users]);
    }

    public function registerUser(Request $request){
        $validateData = $request->validate([
            'firstname' => 'required' ,
            'lastname' => '',
            'email' => 'required | email',
            'role' => 'required',
            'gender' => 'required',
            'displaypicture' => '',
            'password' => 'required | confirmed',
            'password_confirmation' => 'required |required_with: password| same:password'
        ]);

        $user = new User();
        $user->firstname = $validateData['firstname'];
        $user->lastname = $validateData['lastname'];
        $user->email = $validateData['email'];
        $user->role = $validateData['role'];
        $user->gender = $validateData['gender'];
        $user->displaypicture = $validateData['displaypicture'];
        $user->password = bcrypt($validateData['password']);
        $user->password_confirmation =bcrypt($validateData['password_confirmation']);

        $user->save();

        return "Data berhasil diinput ke database";
       
    }

    public function login(Request $request){
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        if(Auth::attempt($credentials)){
            return redirect('/dashboardAdmin');
        }

        else{
            return redirect()->route('login')->with('error', 'Invalid credentials');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function updateProfile(Request $request)
    {
        $validateData = $request->validate([
            'firstname' => 'required',
            'lastname' => '',
            'email' => 'required|email',
            'role' => 'required',
            'gender' => 'required',
            'displaypicture' => '',
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);

        $user = Auth::user();

        // Update non-password fields
        $user->update([
            'firstname' => $validateData['firstname'],
            'lastname' => $validateData['lastname'],
            'email' => $validateData['email'],
            'role' => $validateData['role'],
            'gender' => $validateData['gender'],
        ]);

        // Update password only if a new password is provided
        if ($request->filled('password')) {
            // Validate and update the password
            $request->validate([
                'password' => 'required|confirmed',
            ]);

            $user->update([
                'password' => bcrypt($validateData['password']),
            ]);
        }

        return view ('saved');
    }   

    public function removeAccount($id){

        $user = User::findOrFail($id);

        if($user != Auth::user()){
            $user->delete();
            return redirect()->back()->with('success', 'Account removed from database successfully.');
        }
        
    }

    public function updateRole(Request $request, $id){
        $user = User::findOrFail($id);
        $users = User::all();

        $validateData = $request->validate([
            'role' => 'required',
        ]);

        $user-> update([
            'role' => $validateData['role'],
        ]);

        return view('account', ['users' =>  $users]);
    }

}
