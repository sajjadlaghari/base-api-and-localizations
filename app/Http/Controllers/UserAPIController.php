<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ApiBase;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAPIController extends Controller
{
    use ApiBase;
    public function add_user(Request $request)
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required'
        ];

        $Response = $this->Response($request, $rules);

        if ($Response['flag'] !== 1)
            return response()->json($Response, 400);

        $user = new User();

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        

        if($user->save())
        {
            $Response['flag'] =1;
            $Response['message'] = 'User Created Successfully';

            return response($Response,201);
        }
    }
}
