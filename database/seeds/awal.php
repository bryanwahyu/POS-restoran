<?php

use Illuminate\Database\Seeder;
use App\User;
class awal extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=new User;
        $user->nama="Muliadi";
        $user->username="admin";
        $user->password=bcrypt('admin');
        $user->role="admin";
        $user->save();

        $user=new User;
        $user->nama="kasir";
        $user->username='kasir';
        $user->password=bcrypt('kasir');
        $user->role='kasir';
        $user->save();


    }
}
