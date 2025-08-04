<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'post_count',
        'created_by',
        'updated_by',
    ];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::updated(function ($tag) {
        });
    }

    /**
     * Update the post count for this tag
     */
    public function updatePostCount(): void
    {
        $this->post_count = $this->posts()->count();
        $this->saveQuietly();
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}