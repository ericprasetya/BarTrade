<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barter extends Model
{
    use HasFactory;
    protected $guarded =[
        'id'
    ];

    public function seller(){
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function buyer(){
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function sellerProduct(){
        return $this->belongsTo(Product::class, 'seller_product_id');
    }

    public function buyerProduct(){
        return $this->belongsTo(Product::class, 'buyer_product_id');
    }

    public function payment(){
        return $this->belongsTo(Payment::class, 'payment_id');
    }

    public function courier(){
        return $this->belongsTo(Courier::class, 'payment_id');
    }
}
