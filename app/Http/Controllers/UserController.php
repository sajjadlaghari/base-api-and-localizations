<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
use App\Models\User;
use App\Models\UserLocalization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {

        // Get all permission
        $permissions = Permission::all();

        // $adminRole = Role::where('name', 'admin')->first();
        $adminRole = Role::where('name', 'writer')->first();

        // Assign all permissions to the role
        $adminRole->syncPermissions($permissions);

        
        $user = User::find(1); // Fine User
        $user->syncRoles('writer');  // Add New role
        // $user->syncRoles([]);  // for remove all roles from current  User


        $user = User::find(1); // Replace `1` with the user ID
        $permissions = $user->getAllPermissions();

        if ($user->can('create-user'))
        {
            echo "<p>You are an admin!</p>";

        }

        $users = User::all();
        $permissionsGroupedByGroupName = Permission::all()->groupBy('group_name');

        return view('users.index',['users' => $users,'permissionsGroupedByGroupName' => $permissionsGroupedByGroupName]);
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
