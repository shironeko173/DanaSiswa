<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class HomeController extends Controller
{
    public function index()
    {
        
        return view('home' , [
            'faqs'=>Faq::all()
        ]);
    }
}
