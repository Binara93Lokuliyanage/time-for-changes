<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Blogger;

class Post extends Model
{
    use HasFactory;

    public function blogger(){
        return $this->belongsTo(Blogger::class);
    }
}
