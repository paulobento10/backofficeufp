<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('index'); //welcome
    }

    public function about(){
        return view('about');
    }

    public function blogSingle(){
        return view('blog-single');
    }

    public function blog(){
        return view('blog');
    }

    public function contact(){
        return view('contact');
    }

    public function courseSingle(){
        return view('course-single');
    }

    public function course(){
        return view('course');
    }

    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }
}

