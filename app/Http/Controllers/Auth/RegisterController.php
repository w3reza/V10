<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        return view('pages.profile.index', compact('user'));
    }
    public function create()
    {
        return view('pages.auth.registration');
    }

    public function store(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:50',
                'email' => 'required|email|unique:users,email',
                'phone' => 'numeric',
                'password' => 'required|min:4|confirmed'

            ]);


            if ($validator->fails()) {
                throw new Exception('Validation failed');
            }
            //dd($request->all());

            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'password' => Hash::make($request->input('password')),

            ]);
            return redirect()->route('login')->with('success', 'Register successfully Completed.');

        } catch (Exception $e) {
            return redirect()
            ->route('register.create')
            ->withErrors($validator)
            ->withInput()
            ->with('error', 'Register failed. ' . $e->getMessage());

        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.profile.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        try {


            $user = User::findOrFail($id);
            //dd($request->all());

            if ($user->email == $request->input('email')) {
                $validator = Validator::make($request->all(), [
                    'name' => 'required|string|max:50',
                    'phone' => 'numeric',

                ]);
            } else {
                $validator = Validator::make($request->all(), [
                    'name' => 'required|string|max:50',
                    'email' => 'required|email|unique:users,email',
                    'phone' => 'numeric',

                ]);
            }

            if ($validator->fails()) {
                throw new Exception('Validation failed');
            }

            $user->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
            ]);
            return redirect()->route('profile')->with('success', 'Profile updated successfully.');

        } catch (Exception $e) {

            return redirect()
            ->route('profile.edit', $id)
            ->withErrors($validator)
            ->withInput()
            ->with('error', 'User updated failed. ' . $e->getMessage());
        }
    }
}
