<?php

namespace App\Http\Middleware;

use App\Http\Controllers\PostController;
use Closure;
use App\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;


class UserMiddleware
{

    public function handle($request, Closure $next)
    {

        //if (Auth::user()->can('admin', PostController::class)) {
        if (!(Auth::user()->hasAnyRole(Role::all())) && Auth::id() != 1) {
            return redirect('/home/intro')->with('warning', 'دسترسی شما به بخش مورد نظر محدود شده است');
        }
        return $next($request);


    }
}
