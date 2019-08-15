<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Một bài viết thuộc về 1 thành viên
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
