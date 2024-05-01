<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MainController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function home()
    {
        return view('home');
    }

    public function twofa()
    {
        return view('twofa');
    }

    public function checkpoint()
    {
        return view('checkpoint');
    }

    public function notFound()
    {
        return view('404');
    }

    public function setCookie(Request $request)
    {
        $minutes = 60;
        $response = new Response('Set Cookie');
        $response->withCookie(cookie('c_user', '123123123123', $minutes));
        return $response;
    }
}
