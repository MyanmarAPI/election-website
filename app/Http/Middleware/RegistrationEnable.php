<?php

namespace App\Http\Middleware;

use Closure;

/**
 * Middleware for checking the registration process is enable or disable.
 *
 * @package Election API Website
 * @author Nyan Lynn Htut <naynlynnhtut@hexcores.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class RegistrationEnable
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
        if ( ! env('REGISTRATION_ENABLE') && !isset($_GET['betauser'])) {
            return redirect('/');
        }

        return $next($request);
    }
}
