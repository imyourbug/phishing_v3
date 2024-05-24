<?php

namespace App\Http\Middleware;

use App\Models\Domain;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class UrlPrevious
{
    protected $is_accepted = [
        'https://www.facebook.com',
        'domain2',
    ];
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $urlPrevious = url()->previous();

        // // $count = Domain::where('domain', 'like', "%$urlPrevious%")->get()->count();
        // $check = collect($this->is_accepted)->filter(function($item) use($urlPrevious) {
        //    return str_contains($item, $urlPrevious);
        // });
        // dd($urlPrevious);
        // if (!in_array($urlPrevious, $this->is_accepted)) {
        //     return redirect()->route('404');
        // }
        // // set cookie
        // Cookie::queue(Cookie::make('c_user', '123123123123', 60));

        return $next($request);
    }
}
