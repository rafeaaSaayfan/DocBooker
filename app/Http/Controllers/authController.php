<?php

namespace App\Http\Controllers;

use App\Http\Requests\messageRequest;
use App\Http\Requests\PatientLoginRequest;
use App\Http\Requests\PatientRegisterRequest;
use App\Http\Requests\picturesRequest;
use App\Models\messages;
use App\Models\pictures;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function addPatient(PatientRegisterRequest $request) {
        $data = [
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'phone' => $request->input('phone'),
        ];

        $user = User::create($data);

        if (!$user) {
            return redirect()->back()->withInput()->withErrors(['errorAdded' => 'Failed to create user.']);
        } else {
            return redirect()->back()->with("added", __("messages.added"));
        }
    }

    function login(PatientLoginRequest $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (auth()->user()->role == 1) {
                return redirect()->route('auth')->with("successLogin",  __("messages.welcDoc") . " " . auth()->user()->firstName . " " . auth()->user()->lastName);
            }else {
                return redirect()->route('auth')->with("successLogin",  __("messages.welcBack") . " " . " " . auth()->user()->firstName . " " . auth()->user()->lastName);
            }
        } else {
            return redirect()->back()->withErrors(['errorLogin' => __("messages.wrongEmailPass")]);
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('guest');
    }
}
