<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Setting;

class SettingMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       
        $request->attributes->add([
            'show-greetings' => Setting::where('type', 'show-greetings')->pluck('value')->first(),
            'show-company-info' => Setting::where('type', 'show-company-info')->pluck('value')->first(),

            'home-post-single-menu-number' => Setting::where('type', 'home-post-single-menu-number')->pluck('value')->first(),
            'home-post-single-title'=> Setting::where('type', 'home-post-single-title')->pluck('value')->first(),
            'home-post-single-menu' => Setting::where('type', 'home-post-single-menu')->pluck('value')->first(),

            'home-post-multiple-title'=>Setting::where('type', 'home-post-multiple-title')->pluck('value')->first(),
            'home-post-multiple-menu-number'=>Setting::where('type', 'home-post-multiple-menu-number')->pluck('value')->first(),
            'home-post-multiple-title'=>Setting::where('type', 'home-post-multiple-title')->pluck('value')->first(),
            'show-employee-info'=>Setting::where('type', 'show-employee-info')->pluck('value')->first(),
            'design'=>Setting::where('type', 'design')->pluck('value')->first(),
            'photo-slider-at'=>Setting::where('type', 'photo-slider-at')->pluck('value')->first(),
        ]);
        return $next($request);
    }
}
