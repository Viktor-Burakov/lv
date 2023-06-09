<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    public function __invoke(Post $post)
    {
        $post->delete();

        return response([]);
    }
}
