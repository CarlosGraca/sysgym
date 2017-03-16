<?php

namespace App\Http\Middleware;

use App\ConsultAgenda;
use Closure;

class CheckAgenda
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
        $agenda =   ConsultAgenda::where('status','<>',0)->get();
        $today =    \Carbon\Carbon::now()->format('Y-m-d');
        if (!empty($agenda)){
            foreach ($agenda as $item) {
                if ($item->date < $today){
                    $item->status = 3;
                    $item->save();
                }
                else if($item->date >= $today && $item->status == 3){
                    $item->status = 1;
                    $item->save();
                }
            }
        }
        
        return $next($request);
    }
}
