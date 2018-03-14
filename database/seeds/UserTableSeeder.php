<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $user = new App\User();
        $user->name = 'Jonathan Casas';
        $user->email = 'joncasasq@gmail.com';
        $user->password = bcrypt('Prueba2018*');
        $user->save();
    }

}
