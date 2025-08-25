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
        dd([
        'APP_URL from env()' => env('APP_URL'),
        'APP_URL from config()' => config('app.url'),
        'Current URL scheme' => URL::current(),
        'Asset URL example' => asset('test'),
        'Full application URL' => URL::to('/'),
        'Is HTTPS?' => request()->isSecure(),
        'Environment' => App::environment()
        ]);
        
        return view('home' , [
            'faqs'=>Faq::all()
        ]);
    }
}
