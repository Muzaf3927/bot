<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class TestController extends Controller
{

    public function viewLogin()
    {
        return view('login');
    }

    public function create(Request $request)
    {
        $request->validate([
            'username' => 'required|min:3|max:15',
            'email' => 'required|email',
            'password' => 'required|min:6|max:10',
        ],
        [
            'username.required' => 'Ismingiz tuldiriliwi wart min 3 ta maks 15',
            'username.min' => 'Ismingiz min 3 ta belgi',
            'username.max' => 'Ismingiz maks 15 ta belgi',
            'email.unique' => 'Bu email bor',
            'email.required' => 'Emailingkiritish shart',
            'password.required' => 'Paroli kiritiw wart min 6 ta maks 10',
            'password.min' => 'Parol min 6 ta belgi',
            'password.max' => 'Parol maks 10 ta belgi',
        ]);

//        $user = User::create([
//            'name' => $request->username,
//            'email' => $request->email,
//            'password' => $request->password,
//        ]);

        $user = new User();
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->password = bcrypt($request->password);
        $user->save();

        return view('login');

    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:10',
        ],
        [
            'email.required' => 'Emailingkiritish shart',
            'password.required' => 'Paroli kiritiw wart min 6 ta maks 10',
            'password.min' => 'Parol min 6 ta belgi',
            'password.max' => 'Parol maks 10 ta belgi',
        ]);

        $user = User::where('email', $request->email)->first();
         if ($user && \Hash::check($request->password, $user->password)){
                 return view('admin', compact('user'));
         }

         return redirect()->route('login')->withErrors(['login_error' => 'Email yoki parol xato']);

    }



}

