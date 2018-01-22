<?php

namespace App\Jobs;

use App\Mail\UserCreateMail;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SendReminderEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;

    protected $user;

    /**
     * Create a new job instance.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        var_dump('hello world');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        var_dump('hello world2');
        \Mail::to('carsonlius@163.com')
            ->cc('1332559075@qq.com')
            ->send(new UserCreateMail($this->user));
    }
}
