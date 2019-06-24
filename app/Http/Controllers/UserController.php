<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;





class UserController extends Controller
{
    public function index()
        {
            return response()->json(User::all());
        }

    public function login(Request $request)
    {
        $status = 401;
        $response = ['error' => 'Unauthorised'];

        if (Auth::attempt($request->only(['email', 'password']))) {
            $status = 200;
            $response = [
                'user' => Auth::user(),
                'token' => Auth::user()->createToken('feater')->accessToken,
            ];
        } 

        return response()->json($response, $status);
    }

    public function register(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|max:50',
        //     'email' => 'required|email',
        //     'password' => 'required|min:6',
        //     'c_password' => 'required|same:password',
        // ]);

        // if ($validator->fails()) {
        //     return response()->json(['error' => $validator->errors()], 401);
        // }

        $data = $request->only(['name', 'email', 'password', 'address', 'zipCode', 'city', 'sport_id', 'level']);
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        $user->is_admin = 0;

        return response()->json([
            'user' => $user,
            'token' => $user->createToken('feater')->accessToken,
        ]);
    }
}
