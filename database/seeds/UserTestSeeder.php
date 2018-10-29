<?php

use Illuminate\Database\Seeder;

class UserTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $group = \App\Model\UserGroup::where('name','examiner')->first();
        $user = new \App\Model\User();
        $user->name = "Albraa Hesham";
        $user->email = "aaa@mail.com";
        $user->password = Hash::make("123456");
        $user->group()->associate($group);
        $user->save();



        $group1 = \App\Model\UserGroup::where('name','registrar')->first();
        $user1 = new \App\Model\User();
        $user1->name = "Mohammed Hesham";
        $user1->email = "m@mail.com";
        $user1->password = Hash::make("123456");
        $user1->group()->associate($group1);
        $user1->save();
    }
}
