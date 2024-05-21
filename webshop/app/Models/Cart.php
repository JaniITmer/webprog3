<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request; 

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        // Other fillable columns
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function store(Request $request, $userId)
    {
        return Cart::create([
            'user_id' => $userId,
            // Other data for the cart
        ]);
    }
}