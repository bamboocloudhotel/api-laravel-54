<?php

namespace App\Http\Middleware;

use Closure;

class BasicAuth
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
        $AUTH_USER = 'test@user.com';
        $AUTH_PASS = 'test54321';
        header('Cache-Control: no-cache, must-revalidate, max-age=0');
        $has_supplied_credentials = !(empty($_SERVER['PHP_AUTH_USER']) && empty($_SERVER['PHP_AUTH_PW']));
        $is_not_authenticated = (
            !$has_supplied_credentials ||
            $_SERVER['PHP_AUTH_USER'] != $AUTH_USER ||
            $_SERVER['PHP_AUTH_PW']   != $AUTH_PASS
        );
        if ($is_not_authenticated) {
            $datetime = date('Y-m-d') . 'T' . date('H:i:s');
            header('HTTP/1.1 401 Authorization Required');
            header('WWW-Authenticate: Basic realm="Access denied"');
            exit("
<OTA_HotelResNotifRS EchoToken=\"E1232\" TimeStamp=\"{$datetime}\">
    <Errors>
        <Error Code=\"4\" Status=\"NotProcessed\" ShortText=\"Invalid credentials\" />
    </Errors>
</OTA_HotelResNotifRS>
");
        }
        return $next($request);
    }
}
