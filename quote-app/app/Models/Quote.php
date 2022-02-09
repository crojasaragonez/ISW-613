<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;
    protected $fillable = ['date', 'client_id', 'state', 'created_by_user_id', 'updated_by_user_id'];

    public function lines()
    {
        return $this->hasMany(QuoteDetail::class);
    }
}
