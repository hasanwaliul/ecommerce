<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    // Bangla Language
    public function Bangla(){
        Session()->get('language');
        Session()->forget('language');
        Session::put('language', 'bangla');

        return redirect()->back();
    }
    // English Language
    public function English(){
        Session()->get('language');
        Session()->forget('language');
        Session::put('language', 'english');

        return redirect()->back();
    }
}
