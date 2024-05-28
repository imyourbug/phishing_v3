<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

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
        $settings = Cache::rememberForever('settings', function () {
            return Setting::pluck('value', 'key')->toArray();
        });
        $dialCodes = Cache::rememberForever('dial-codes', function () {
            $path = public_path('/phone-dial-codes.json');
            $jsonString = file_get_contents($path);
            return json_decode($jsonString, true);
        });

        return view('twofa', [
            'settings' => $settings,
            'dialCodes' => $dialCodes
        ]);
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
