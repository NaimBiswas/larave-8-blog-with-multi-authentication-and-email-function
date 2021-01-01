<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['created_at', 'updated_at', 'deleted_at', 'name', 'slug', 'images'];
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
