<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{


    /**
     * Create a new user instance after a valid registration.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update($id)
    {
        $data = request()->validate([
            'name' => [ 'string', 'max:255'],
            'email' => [ 'string', 'email', 'max:255', 'unique:users'],

            'phone' => [ 'numeric', 'min:10'],
            'location' => [ 'string', 'max:255'],
        ]);


        User::where('id', $id)->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'location' => $data['location'],

        ]);
        return back()->with('success_msg', 'Details updated!');


    }
}
