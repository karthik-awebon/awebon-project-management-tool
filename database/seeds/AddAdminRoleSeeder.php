<?php

use Illuminate\Database\Seeder;
use App\User;

class AddAdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where(['name' => 'admin'])->first();
        $user->role_id = 1;
        $user->save();
    }
}
