<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userTable = new User();
        $users = [
            [
                'name' => 'Administrador',
                'surname' => 'Administrador',
                'email' => 'admin@expensemanager.com',
                'password' => 'ExpenseManager2020.',
                'active' => true,
                'enable' => true,
            ]
        ];

        DB::table($userTable->getTable())->insert($users);
    }
}
