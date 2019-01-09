<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Resource;

class CreateUserForResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $resources = Resource::all();
        foreach ($resources as  $resource) {
            if ($resource->user_id != 0) {
                continue;
            }
            $user = new User;
            $user->name = $resource->resource_name;
            $user->email = $resource->resource_name.'@email.com';
            $user->password =Hash::make('test-123');
            $user->role_id = config('app.developerroleid');
            $user->save();
            $resource->user_id = $user->id;
            $resource->save();
        }
    }
}
