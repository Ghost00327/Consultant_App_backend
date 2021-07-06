<?php


/*___________________________________________________________________________
|                                                                           |
|  This middleware is used for filtering tomorrow request which displays    |
|  report informatons.                                                      |
|___________________________________________________________________________|
|                                                                           |
| @retrun  array                                                            |
|                                                                           |
|___________________________________________________________________________|
*/
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
class CheckTime
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
        $count = 0;        
        $onetime = $request->current_date;
        $itinerarys = DB::table('itinerarys')->get();
        foreach ($itinerarys as $itinerary) 
        {
           $twotime = $itinerary->start_time;
           $diff = $onetime - $twotime;
           if ( $diff < 0)
           {
                $count++;
           }            
        }
        if ($count <= 0) {
            return response('null');
             
        }
        return $next($request);
    }
}
