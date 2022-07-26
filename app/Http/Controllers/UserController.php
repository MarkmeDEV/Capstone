<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserPersonalInformation;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function store(Request $request) {
        $user = new User();
        $userPersonalInformation = new UserPersonalInformation();

        $userPersonalInformation->first_name = $request->fname;
        $userPersonalInformation->middle_name = $request->mname;
        $userPersonalInformation->last_name = $request->lname;
        $userPersonalInformation->birthdate = $request->birthdate;
        $userPersonalInformation->street = $request->street;
        $userPersonalInformation->barangay = $request->barangay;
        $userPersonalInformation->city = $request->municipality;
        $userPersonalInformation->province = $request->province;
        $userPersonalInformation->zip_code = $request->zip_code;
        $userPersonalInformation->phone_number = $request->phone_number;
        $userPersonalInformation->save();

        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_personal_information_id = $userPersonalInformation->id;
        $user->name = $userPersonalInformation->first_name . ' ' . 
        $userPersonalInformation->middle_name . ' ' . $userPersonalInformation->last_name;
        $user->save();

        return redirect('login');
    }
}
