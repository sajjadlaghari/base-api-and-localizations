<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
use App\Models\User;
use App\Models\UserLocalization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index',['users' => $users]);
    }

    public function add_form()
    {
        return view('users.add');
    }

    public function add(AddUserRequest $request)
    {
        $user = new User();

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        $userLocalization = UserLocalization::firstOrNew(['lang_key' => env('DEFAULT_LANGUAGE'), 'user_id' => $user->id]);

        $userLocalization->first_name = $request->first_name;
        $userLocalization->last_name = $request->last_name;
        $userLocalization->save();

        return redirect()->route('users');
    }
}
