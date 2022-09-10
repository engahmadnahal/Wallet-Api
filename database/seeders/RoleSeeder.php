<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::create(['guard_name'=>'compony','name'=>'Super Admin']);
        Role::create(['guard_name'=>'employee','name'=>'Employee']);
        Role::create(['guard_name'=>'point','name'=>'Pay Point']);
        Role::create(['guard_name'=>'users','name'=>'User']);
    }
}
