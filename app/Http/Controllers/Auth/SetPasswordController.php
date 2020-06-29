<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SetPasswordController extends Controller
{
    public function index(Request $request)
    {
        $email = $request->email;

        return view('auth.passwords.set', compact('email'));
    }

    protected function create(Request $request, User $user)
    {
        $data = request()->validate([
            'password' => ['required']
        ]);

        $verifiedUser = $user->where('email', $request->email)->first();

        $verifiedUser->password = Hash::make($data['password']);
        $verifiedUser->save();

        return redirect('/login');
    }
}
