<?php

namespace App\Http\Controllers\backend\profile;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //PROFILE INDEX
    public function index(){
        $userData = Auth::user();
        // dd($userData);
        return view('backend.profileSetting.profile', compact('userData'));
    }
}
