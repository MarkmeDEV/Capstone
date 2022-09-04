<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserPersonalInformation as UserPersonalInformationModel;

class UserPersonalInformation extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $personalInformation1 = new UserPersonalInformationModel();
        $personalInformation1->first_name = 'Cardo';
        $personalInformation1->middle_name = 'Juan';
        $personalInformation1->last_name = 'Dalisay';
        $personalInformation1->birthdate = date('Y-m-d H:i:s');
        $personalInformation1->street = 1;
        $personalInformation1->barangay = 1;
        $personalInformation1->city = 1;
        $personalInformation1->province = 1;
        $personalInformation1->zip_code = 1;
        $personalInformation1->phone_number = 1;
        $personalInformation1->save();

        $personalInformation1 = new UserPersonalInformationModel();
        $personalInformation1->first_name = 'Juan';
        $personalInformation1->middle_name = 'Dela';
        $personalInformation1->last_name = 'Cruz';
        $personalInformation1->birthdate = date('Y-m-d H:i:s');
        $personalInformation1->street = 1;
        $personalInformation1->barangay = 1;
        $personalInformation1->city = 1;
        $personalInformation1->province = 1;
        $personalInformation1->zip_code = 1;
        $personalInformation1->phone_number = 1;
        $personalInformation1->save();

        $personalInformation1 = new UserPersonalInformationModel();
        $personalInformation1->first_name = 'Juan';
        $personalInformation1->middle_name = 'Dela';
        $personalInformation1->last_name = 'Cruz';
        $personalInformation1->birthdate = date('Y-m-d H:i:s');
        $personalInformation1->street = 1;
        $personalInformation1->barangay = 1;
        $personalInformation1->city = 1;
        $personalInformation1->province = 1;
        $personalInformation1->zip_code = 1;
        $personalInformation1->phone_number = 1;
        $personalInformation1->save();

        $personalInformation1 = new UserPersonalInformationModel();
        $personalInformation1->first_name = 'Customer';
        $personalInformation1->middle_name = 'Dela';
        $personalInformation1->last_name = 'Cust';
        $personalInformation1->birthdate = date('Y-m-d H:i:s');
        $personalInformation1->street = 1;
        $personalInformation1->barangay = 1;
        $personalInformation1->city = 1;
        $personalInformation1->province = 1;
        $personalInformation1->zip_code = 1;
        $personalInformation1->phone_number = 1;
        $personalInformation1->save();
    }
}
