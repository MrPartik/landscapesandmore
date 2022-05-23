<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Library\Utilities;
use Illuminate\Http\Request;

class userInteraction
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $this->saveUsersClick($request);
        return $next($request);
    }

    private function saveUsersClick(Request $oRequest)
    {
        $aData = [
            'route'      => $oRequest->path(),
            'ip_address' => $oRequest->getClientIp(),
            'created_at' => Carbon::now()->format('c'),
        ];
        Utilities::insertDataInJson('website_visit', $aData, false, 'website_interaction.json');
    }
}
