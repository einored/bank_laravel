<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $accounts = ['Bebras', 'Jonas', 'Ona', 'Dony', 'Aleksas', 'Denis', 'Giedre'];

        foreach(range(1,77) as $_){
            $iban = 'LT';
            $iban .= (string)rand(0, 9);
            $iban .= (string)rand(0, 9);
            $iban .= '12121';
            for ($i = 0; $i < 11; $i++)
                $iban .= (string)rand(0, 9);

            DB::table('accounts')->insert([
            'personalCode' => rand(1, 6).rand(90, 20).rand(10, 12).rand(10, 29).rand(1000, 9999),
            'name' => $accounts[rand(0, count($accounts) - 1)],
            'surname' => $accounts[rand(0, count($accounts) - 1)],
            'accNumber' => $iban,
            'balance' => 0,
        ]);
        }

        DB::table('users')->insert([
            'name' => 'Bebras',
            'email' => 'bebras@gmail.com',
            'role' => 1,
            'password' => Hash::make('123'),
        ]);
        DB::table('users')->insert([
            'name' => 'Jonas',
            'email' => 'jonas@gmail.com',
            'role' => 10,
            'password' => Hash::make('123'),
        ]);
    }

}
