<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class PostsModel extends Model
{
    protected $table = "posts";

    protected $primaryKey = "id";

    protected $fillable = [
        'title',
        'description',
        'content',
        'active',
        'user_id'
    ];

    public function author()
    {
        return $this->hasOne(User::class, 'id','user_id');
    }
}
