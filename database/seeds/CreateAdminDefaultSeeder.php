<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;

class CreateAdminDefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin();
        $admin->name = "Admin Test";
        $admin->email = 'admin@gmail.com';
        $admin->password = Hash::make('12345678az');
        $admin->save();
    }
}
