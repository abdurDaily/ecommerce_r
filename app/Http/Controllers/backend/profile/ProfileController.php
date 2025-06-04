<?php

namespace App\Http\Controllers\backend\profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //PROFILE INDEX
    public function index(){
        return view('backend.profileSetting.profile');
    }
}
