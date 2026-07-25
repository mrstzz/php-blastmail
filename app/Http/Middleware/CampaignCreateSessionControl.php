<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CampaignCreateSessionControl
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // If the referer is not from the same route, forget the session
        if(! str($request->header('Referer'))->contains($request->route()->compiled->getStaticPrefix())){
            session()->forget('campaign');
        }else{

            // If the referer is from the same route, check if the session is filled and the tab is filled, if not redirect to the first step of the campaign creation
            $session = session()->get('campaign');
            $tab = $request->route('tab');

            // If the tab is filled and the session is blank, redirect to the first step of the campaign creation
            if( filled($tab) && blank(data_get($session,'name'))){
                return to_route ('campaigns.create');
            }


            if($tab == 'schedule' && blank(data_get($session,'body'))){
                return to_route ('campaigns.create',['tab' => 'template']);
            }

        }
        return $next($request);
    }
}
