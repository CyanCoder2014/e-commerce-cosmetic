<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

use App\User;

use App\ChatUserData;
use App\Notifications\Newsletter;
use App\Notifications\UserRegister;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Modules\BlogModule\Contents\ContentCat;


class PanelData extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        $user = User::find(Auth::id());
//       $notifications = $user->notifications ;
       //$messages = $user->unreadNotifications;

        $categories = ContentCat::where('parent_id' ,'0')->where('state', '!=' ,'0')->where('state', '!=' ,'10')->orderBy('state', 'desc')->paginate(7);
        $categories2 = ContentCat::where('parent_id' ,'0')->where('state' ,'0')->orderBy('state', 'desc')->paginate(3);

        view()->share(['categories' => $categories, 'categories2' => $categories2]);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
