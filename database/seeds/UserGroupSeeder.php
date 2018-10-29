<?php

use Illuminate\Database\Seeder;

class UserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $examiner = new \App\Model\UserGroup();
        $examiner->name = "examiner";
        $examiner->save();

        $registrar = new \App\Model\UserGroup();
        $registrar->name = "registrar";
        $registrar->save();


        $watcher = new \App\Model\UserGroup();
        $watcher->name = "watcher";
        $watcher->save();
    }
}
