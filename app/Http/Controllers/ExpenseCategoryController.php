<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Models\ExpenseCategory;

class ExpenseCategoryController extends Controller
{
    public function index()
    {
        $expenseCategories = ExpenseCategory::select('id', 'name')
            ->whereNull('deleted_at')
            ->get();

        return response()->json(['data' => $expenseCategories], Response::HTTP_OK);
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:expense_category'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $category = new ExpenseCategory();
        $category->name = $request->input('name');
        $category->save();

        return response()->json(['data' => $category], Response::HTTP_OK);
    }

    public function show(int $id)
    {
        $expenseCategories = ExpenseCategory::select('id', 'name')
            ->where('id', $id)
            ->get();

        return response()->json(['data' => $expenseCategories], Response::HTTP_OK);
    }

    public function update(Request $request, string $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => [
                    'required',
                    Rule::unique('expense_category')->ignore($id)
                ]
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 422);
            }

            $category = ExpenseCategory::findOrFail($id);
            $category->name = $request->input('name');
            $category->save();

            return $category;
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error' => 'Category not found.'], 404);
        }
    }

    public function destroy(string $id)
    {
        try {
            $category = ExpenseCategory::findOrFail($id);
            $category->delete();

            return response()->json(['message' => 'Categoría eliminado correctamente.']);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error' => 'Category not found.'], 404);
        }
    }
}
