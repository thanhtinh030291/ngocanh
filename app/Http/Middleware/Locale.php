<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Config;
use Session;
use App\Language;

class Locale
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
      $raw_locale = Session::get('locale');
      if (in_array($raw_locale, \Config::get('app.locales'))) {
        $loc = $raw_locale;
      }else{
        $lang = Language::find(1);
        $loc = Config::get('app.locale');
          \Session::put('locale',$loc);
          \Session::put('idlocale',1);
          \Session::put('currencylocale',$lang->currency);
          \Session::put('curency_codelocale',$lang->curency_code);
          \Session::save();
      }
      \App::setLocale($loc);         
      return $next($request);
   }
 }