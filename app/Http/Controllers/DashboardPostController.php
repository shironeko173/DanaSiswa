<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        return view('admin.news.manage',[ 
            'posts'=>Post::all(),
            'posts'=>Post::Searching()->paginate(10) 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.add',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'body' => 'required',
            'image' => 'required|image|file|max:3072'
        ]);

        $validatedData['image'] = $request->file('image')->store('post-cover-images', 'public');
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 150);
        $validatedData['slug'] = Str::slug($request->title,'-');

        Post::create($validatedData);
        Alert::success('Success', 'Success!! Berita Baru Telah Sukses Ditambahkan')->autoClose(4000);
        return redirect('/berita/kelola-berita');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.news.preview',[
            "title" => "Single Post",
            "post" => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.news.edit',[
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'body' => 'required',
            'image' => 'image|file|max:3072'
        ]);

        if($request->file('image')){
            Storage::delete($request->oldImage);
            $validatedData['image'] = $request->file('image')->store('post-cover-images', 'public');
        }
        $validatedData['slug'] = Str::slug($request->title,'-');
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 150);

        Post::where('id', $post->id)
            ->update($validatedData);

        Alert::success('Success', 'Success!! Berita Telah Sukses Diedit')->autoClose(4000);
        return redirect('/berita/kelola-berita');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Storage::delete($post->image);
        Post::destroy($post->id);
        Alert::success('Success', 'Success!! Berita berhasil dihapus')->autoClose(4000);
        return redirect('/berita/kelola-berita');
    }
}
