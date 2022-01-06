<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckEmailSettingSaved
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $emailSetting = auth()->user()->emailSetting;

        if(
            is_null($emailSetting->mail_host)
            || is_null($emailSetting->mail_port)
            || is_null($emailSetting->mail_username)
            || is_null($emailSetting->mail_password)
            || is_null($emailSetting->mail_encryption)
        ){
            return redirect()->route('email.setting.edit');
        }

        return $next($request);
    }
}
