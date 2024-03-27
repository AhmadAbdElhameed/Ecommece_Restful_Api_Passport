<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends ApiController
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return $this->showAll($users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'verified' => User::UNVERIFIED_USER,
            'verification_token' => User::generateVerificationCode(),
            'admin' => User::REGULAR_USER,
        ]);

        return $this->showOne($user,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return $this->showOne($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {




        if ($request->has('name')){
            $user->update([
                'name' => $request->name,
            ]);
        }
        if ($request->has('password')){
            $user->update([
                'password' => bcrypt($request->password),
            ]);
        }
        if ($request->has('email')){
            $user->update([
                'email' => $request->email,
                'verified' =>User::UNVERIFIED_USER,
                'verification_token' =>User::generateVerificationCode(),
            ]);
        }

        if ($request->has('admin')){
            if(!$user->isVerified()){
                return response()->json(['error' => 'This User Not Verified .' , 'code' => 409],409);
            }else{
                $user->update([
                    'admin' => $request->admin,
                ]);
            }
        }
//
//        if (!$user->isDirty()){
//            return response()->json(['error' => 'You need to specify a different value to update.' , 'code' => 422],422);
//
//        }

        return $this->showOne($user,201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return $this->showOne($user);
    }
}
