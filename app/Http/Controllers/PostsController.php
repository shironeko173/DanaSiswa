<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.blog',[
            'posts' => Post::all(),
            'posts'=>Post::Searching()->paginate(4),
            'title' => "Blog",
            'categories'=> Category::all(),
            'postsbaru' => Post::orderBy('created_at', 'DESC')->limit('5')->get(),
        ]);
    }
 
    public function show(Post $post)
    {
        return view('posts.detail',[
            'post'=> $post,
            'categories'=> Category::all(),
            'postsbaru' => Post::orderBy('created_at', 'DESC')->limit('5')->get(),
        ]);
    }

    public function kategori(Category $kategori)
    {
        return view('posts.kategori',[
            'kategori'=> $kategori->name,
            'posts'=> $kategori->posts,
            'categories'=> Category::paginate(4),
            'postsbaru' => Post::orderBy('created_at', 'DESC')->limit('5')->get(),
        ]);
    }
} 
