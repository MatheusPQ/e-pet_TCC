<?php

namespace App\Http\Middleware;

use Closure;

use App\PetshopUser;
use Illuminate\Support\Facades\Auth;

class IsPetshopOwner
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
        $petshopUser = PetshopUser::where('petshop_id', $request->id)->first();
        if($petshopUser->user_id != Auth::user()->id){
            session()->flash('erro', 'Não autorizado');
            return redirect('/');
        }
        return $next($request);
    }
}
