<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Blogger extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function posts(){
        return $this->hasMany(Post::class, 'blogger_id', 'id');
    }
}
