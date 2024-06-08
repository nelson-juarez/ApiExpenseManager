<?php

namespace Database\Seeders;

use App\Models\ExpenseCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ExpenseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $expenseCategory = new ExpenseCategory();
        $categories = [
            ['name' => 'Carnicería'],
            ['name' => 'Celular'],
            ['name' => 'Colegio'],
            ['name' => 'Combustible'],
            ['name' => 'Internet'],
            ['name' => 'Luz'],
            ['name' => 'Restaurant'],
            ['name' => 'Supermercado'],
            ['name' => 'Tarjeta de crédito'],
        ];

        DB::table($expenseCategory->getTable())->insert($categories);

    }
}
