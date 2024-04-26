<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model

    {
        protected $table = 'cart'; 
    
        protected $fillable = [
            'user_id', 
            'product_id', 
            'mennyiseg' 
            
        ];
    
        
        public function user()
        {
            return $this->belongsTo(User::class);
        }
    
        
        public function termek()
        {
            return $this->belongsTo(Product::class, 'product_id', 'id');
        }
    }
