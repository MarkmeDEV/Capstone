<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    User,
    Cart,
    UserPersonalInformation,
    Role
};
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    function index() {
        $users = User::all();
        $userList = [];

        // dd($users);

        foreach ($users as $user) {
            $personalInformation = UserPersonalInformation::find($user->user_personal_information_id);
            $role = Role::find($user->role_id);

            if (!$personalInformation || !$role) {
                continue; // Skip this user if personal information or role is missing
            }

            if($role->id == 1 || $role->id == 2) {
                $userList[] = [
                    'id' => $user->id,
                    'name' => $personalInformation->first_name . ' ' . $personalInformation->last_name,
                    'email' => $user->email,
                    'role' => $role->role,
                    'phone_number' => $personalInformation->phone_number
                ];
             }

            // dd($role->id);
        }
        
        return view('users.list', ['users' => $userList]);
    } 

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
        $user->role_id = 3; 
        $user->save();

        $newCart = new Cart();
        $newCart->user_id = $user->id;
        $newCart->save();

        return redirect('login');
    }

    function register(Request $request) {
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
        $user->role_id = $request->role; 
        $user->save();

        $newCart = new Cart();
        $newCart->user_id = $user->id;
        $newCart->save();

        return redirect('users');
    }

    public function create() {
        return view('users.create');
    }

    public function show($id) {
        $user = User::find($id);
        $userInformation = UserPersonalInformation::find($user->user_personal_information_id);
        $role = Role::find($user->role_id);

        $data = [
            'id' => $user->id,
            'email' => $user->email,
            'first_name' => $userInformation->first_name,
            'middle_name' => $userInformation->middle_name,
            'last_name' => $userInformation->last_name,
            'birthdate' => $userInformation->birthdate,
            'street' => $userInformation->street,
            'barangay' => $userInformation->barangay,
            'municipality' => $userInformation->city,
            'province' => $userInformation->province,
            'zip_code' => $userInformation->zip_code,
            'phone_number' => $userInformation->phone_number,
            'role' => $role->role,
        ];

        return view('users.show', ['data' => $data]);
    }

    function destroy($id) {
        dd($id);
        // User::find($id)->delete();
        
        // return redirect('users');
    }
}
