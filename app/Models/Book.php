<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'year',
        'slug',
        'body',
        'thumbnail'
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query,$search){
            $query->where(
                fn($query) =>
                $query->where('title','like','%'.$search.'%')
                ->orWhere('description','like','%'.$search.'%')
                ->orWhere('body','like','%'.$search.'%')
                ->orWhere('author','like','%'.$search.'%')
            );
        });
    }
}
