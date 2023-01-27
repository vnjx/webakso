<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Origin;

class PostController extends Controller
{
    public function index()
    {
        $title = '';
        if(request('origin')){
            $origin = Origin::firstWhere('slug', request('origin'));
            $title = ' in ' . $origin->divisi;
        }

        if(request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }
        
        return view('posts', [
            "title" => "Post Penjualan Harian" . $title,
            "active" => 'posts',
            "posts" => Post::latest()->filter(request(['search', 'origin', 'author']))->paginate(7)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('post',[
            "title" => "$post->title",
            "active" => 'posts',
            "post" => $post
        ]);
    }
}
