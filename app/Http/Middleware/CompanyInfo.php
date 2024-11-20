<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Company_info;
use App\Models\Sociel_media;

class CompanyInfo
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
            'name' => Company_info::where('id', '1')->pluck('name')->first(),
            'email' => Company_info::where('id', '1')->pluck('email')->first(),
            'phone' => Company_info::where('id', '1')->pluck('phone')->first(),
            'address' => Company_info::where('id', '1')->pluck('address')->first(),
            'open_time' => Company_info::where('id', '1')->pluck('open_time')->first(),
            'off_day' => Company_info::where('id', '1')->pluck('off_day')->first(),
            'logo' => Company_info::where('id', '1')->pluck('logo')->first(),
            'favicon' => Company_info::where('id', '1')->pluck('favicon')->first(),
            'website'=>Company_info::where('id', '1')->pluck('website')->first(),
            'social_media' => Sociel_media::all()
        ]);
        return $next($request);
    }
}
