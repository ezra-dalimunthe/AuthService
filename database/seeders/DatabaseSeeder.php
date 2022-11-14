<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        \DB::table("user_roles")->truncate();
        \DB::table("users")->delete();
        //super admin
        $user = new User;
        $user->display_name = "Administrator";
        $user->email = "admin@example.com";
        $user->password = Hash::make("secret123");
        $user->status_id=1;
        $user->save();
        $user->roles()->create(["user_id" => $user->id,
            "role" => "administrator"]);

        //front-desk
        $user = new User;
        $user->display_name = "Front Desk";
        $user->email = "front_desk@example.com";
        $user->password = Hash::make("secret123");
        $user->status_id = 1;
        $user->save();
        $user->roles()->create(["user_id" => $user->id,
            "role" => "front_desk"]);

        //book manager
        $user = new User;
        $user->display_name = "Book Manager";
        $user->email = "book_manager@example.com";
        $user->password = Hash::make("secret123");
        $user->status_id = 1;
        $user->save();
        $user->roles()->create(["user_id" => $user->id,
            "role" => "book_manager"]);

        //book manager
        $user = new User;
        $user->display_name = "Member Manager";
        $user->email = "member_manager@example.com";
        $user->password = Hash::make("secret123");
        $user->status_id = 1;
        $user->save();
        $user->roles()->create(["user_id" => $user->id,
            "role" => "member_manager"]);
    }
}
