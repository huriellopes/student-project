<?php

namespace App\Validates\Posts;

use App\Validates\Validate;

class PostsValidate extends Validate
{
    protected $rules = [
        'title' => 'required|max:150',
        'description' => 'required|max:150',
        'content' => 'required|max:255',
        'active' => 'required',
        'user_id' => 'required',
    ];

    protected $messages = [];
}
