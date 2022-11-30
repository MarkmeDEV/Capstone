<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserPersonalInformation;
use App\Models\User;
use App\Models\Role;

class ProfileController extends Controller
{
    function index() {
      $personalInformation = UserPersonalInformation::find(auth()->user()->user_personal_information_id);
      $data = [
        'userId' => auth()->user()->id,
        'userInformation' => $personalInformation
      ];
      return view('profile.show', ['data' => $data]);
    }

    function update(Request $request, $id) {
      $personalInformation = UserPersonalInformation::find($id);
      $personalInformation->first_name = $request->firstName;
      $personalInformation->middle_name = $request->middleName;
      $personalInformation->last_name = $request->lastName;
      $personalInformation->birthdate = $request->birthdate;
      $personalInformation->phone_number = $request->phoneNumber;
      $personalInformation->street = $request->street;
      $personalInformation->barangay = $request->barangay;
      $personalInformation->city = $request->municipality;
      $personalInformation->province = $request->province;
      $personalInformation->zip_code = $request->zipCode;
      $personalInformation->save();    

      return redirect()->route("profile");
    }
}
