<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;

class IndexController extends Controller
{
    public function __invoke()
    {

        $posts = Post::All();

        return $posts;
    }
}
