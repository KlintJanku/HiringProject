<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index(){
        if(Auth::check()){
            return redirect('/posts');
        }else{
            return view('pages.index');
        }
        
    }

    public function about(){
        $title = 'About Us';
        return view('pages.about')->with('title',$title);
    }

    public function services(){
        return view('pages.services');
    }
}
