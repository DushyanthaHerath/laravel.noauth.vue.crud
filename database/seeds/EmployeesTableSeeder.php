<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'name' => Str::random(10),
            'epf' => Str::random(10),
            'address' => Str::random(50),
        ]);
    }
}
