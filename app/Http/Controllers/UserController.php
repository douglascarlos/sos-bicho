<?php

namespace SOSBicho\Http\Controllers;

use Illuminate\Http\Request;
use SOSBicho\Models\User;

class UserController extends Controller
{
    private $userEloquent;

    public function __construct(User $userEloquent)
    {
        $this->userEloquent = $userEloquent;
    }

    public function index(Request $request)
    {
        $users = $this->userEloquent->search($request);
        return view('user.index')->with(compact('users'));
    }
}
