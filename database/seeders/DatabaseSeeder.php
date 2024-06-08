<?php

namespace Database\Seeders;

use App\Models\ExpenseCategory;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ExpenseCategorySeeder::class
        ]);
    }
}
