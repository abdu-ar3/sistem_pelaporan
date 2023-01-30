<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request)
    {
        // return request()->all();
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5|max:255'
        ]);

        // $validateData['password'] = bcrypt($validateData['password']);
        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);

        // Flash (pesan)
        $request->session()->flash('success', 'Registration success, please Login.');
        return redirect('login');
    }
}
