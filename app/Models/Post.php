<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Traits\HasViews;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasViews;

    protected $fillable = [
        'title',
        'content',
        'slug',
        'image',
        'is_published',
        'user_id',
        'views',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
