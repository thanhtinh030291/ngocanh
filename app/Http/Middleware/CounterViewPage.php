<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Config;
use Session;
use App\Counter;

class CounterViewPage
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
      	$time_now = time();    // lưu thời gian hiện tại
		$time_out = 120; // khoảng thời gian chờ để tính một kết nối mới (tính bằng giây)
		$ip_address = $_SERVER['REMOTE_ADDR']; // lưu lại IP của kết nối     
		$counter = Counter::where('ip_address',$ip_address)->orderBy('last_visit','desc')->first();		if($counter == null || (strtotime($counter->last_visit)+$time_out) < $time_now ){
				$count = new Counter;
				$count->ip_address = $ip_address;
				$count->last_visit = date("Y-m-d H:i:s");
				$count->save();
		}
      	return $next($request);
   }
 }