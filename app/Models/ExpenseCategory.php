<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    protected $table = 'expense_category';
    protected $fillable = ['name'];

    public function getTable () {
        return $this->table;
    }

    public function getNameAttribute($value) {
        return $value;
    }

    public function setNameAttribute($value) {
        $this->attributes['name'] = $value;
    }
}
