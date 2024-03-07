<?php

namespace Database\Seeders;

use App\Http\Middleware\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Mockery\Matcher\HasKey;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            'name'=>"leang",
            'email'=>"leang@gmail.com",
            'password'=>Hash::make('12345678')
        ]);
    }
}
