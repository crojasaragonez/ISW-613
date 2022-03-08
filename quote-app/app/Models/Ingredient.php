<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\IngredientCosts;

class Ingredient extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'unit', 'quantity'];

    public function costs()
    {
        return $this->hasMany(IngredientCosts::class);
    }
}
