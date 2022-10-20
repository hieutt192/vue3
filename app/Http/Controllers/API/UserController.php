<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function get_all_user()
    {
        # code...
        $user = User::all();
        return response()->json([
            'users'=>$user
        ],200);
    }
    

}
