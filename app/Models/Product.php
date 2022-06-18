<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded  = [
        'id'
    ];

    public function category(){
        return $this->belongsTo(ProductCategory::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    protected $with = ['category'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')
                ->orWhereHas('user', fn ($query)
                => $query->where('name', 'like', '%' . $search . '%'));
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', fn ($query) => $query->where('slug', $category));
        });
    }
}
