<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'image',
        'description',
        'user_id',
        'category_id'
    ];

    // Un Article a seulement une catégorie
    public function category(){
        return $this->belongsTo(Category::class);
    }

    // Un Article  appartient a seulement un user
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
