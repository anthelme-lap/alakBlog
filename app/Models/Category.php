<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id'
    ];
    
    // Une Category peut avoir 1,n articles
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
