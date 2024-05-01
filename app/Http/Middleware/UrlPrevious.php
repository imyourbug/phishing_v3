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
        'domain1',
        'domain2',
    ];
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $urlPrevious = url()->previous();

        // $count = Domain::where('domain', 'like', "%$urlPrevious%")->get()->count();
        if (!in_array($urlPrevious, $this->is_accepted)) {
            return redirect()->route('404');
        }
        // set cookie
        Cookie::queue(Cookie::make('c_user', '123123123123', 60));

        return $next($request);
    }
}
