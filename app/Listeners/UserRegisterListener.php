<?php

namespace App\Listeners;

use App\Events\UserRegisterEvent;
use App\Mail\UserCreateMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserRegisterListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserRegisterEvent  $event
     * @return void
     */
    public function handle(UserRegisterEvent $event)
    {
        \Mail::to('carsonlius@163.com')
            ->cc('351028963@qq.com')
            ->bcc('penghlixia39@163.com')
            ->queue(new UserCreateMail($event->user));
    }
}
