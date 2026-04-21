<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use App\Models\User;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function showWelcomeView() {
        $cakes = Cake::all();
        return view('welcome', ['cakes' => $cakes]);
    }

    public function login() {
        return view('pages.login');
    }

    public function register() {
        return view('pages.register');
    }

    public function registerSubmit(Request $request) {
        $request->validate([
            'email'                 => 'required|email|unique:users,email',
            'username'              => 'required|string|max:50|unique:users,username|regex:/[a-zA-Z].*/',
            'password'              => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required'          
        ]);

        User::create([
            'email'    => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('login')->with('success', 'You registered successfully!');
    }

    public function loginSubmit(Request $request) {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string'
        ]);

        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            return redirect()->route('home')->with('success', 'You logged in successfully!');
        } else {
            return redirect()->back()->with('error', 'Wrong email or password. Please, try again.');
        }
    }

    public function logoutSubmit(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect()->route('welcome')->with('success', 'You logged out successfully!');
    }

    public function home() {
        $user = Auth::user();
        $cakes = Cake::all();
        return view('pages.home', compact('cakes', 'user'));
    }

    public function profile() {
        $user = Auth::user();
        return view('pages.profile', compact('user'));
    }

    public function update(UpdateUserRequest $request) {
        $input = $request->validated();

        $user = Auth::user();

        $data = [];

        if (!empty($input['username'])) {
            $data['username'] = $input['username'];
        }

        if (!empty($input['telephone'])) {
            $data['telephone'] = $input['telephone'];
        }
        if (!empty($input['address'])) {
            $data['address'] = $input['address'];
        }

        if (!empty($input['password'])) {
            $data['password'] = Hash::make($input['password']);
        }

        if (!empty($data)) {
            $user->update($data);
        }

        return redirect()->back()->with('success', 'Your details were updated successfully!');
    }

}
