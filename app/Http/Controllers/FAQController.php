<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.FAQ.manage',[
            // 'faqs'=>Faq::all(),
            'faqs'=>Faq::Searching()->paginate(5),
        ]);
    }

public function user()
    {
        return view('user.FAQ',[
            'faqs'=>Faq::all(),
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.FAQ.add' );
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
            'question' => 'required',
            'answer'    => 'required'
        ]);
        $validatedData['slug'] = Str::slug($request->question,'-');

        Faq::create($validatedData);
        return redirect('/faq/kelola-faq')->with('success','FAQ Baru Telah Sukses Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        return view('admin.FAQ.edit',[
            'faq' => $faq,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
        $validatedData = $request->validate([
            'question' => 'required',
            'answer'    => 'required'
        ]);
        $validatedData['slug'] = Str::slug($request->question,'-');

        Faq::where('id',$faq->id)
            ->update($validatedData);
        return redirect('/faq/kelola-faq')->with('success','FAQ Telah Sukses Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        Faq::destroy($faq->id);
        return redirect('/faq/kelola-faq')->with('success','FAQ berhasil dihapus');
    }
}
