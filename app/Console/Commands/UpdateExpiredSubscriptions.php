<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Subscribe;
use App\Models\User;
use Carbon\Carbon;

class UpdateExpiredSubscriptions extends Command
{
    protected $signature = 'subscriptions:update-expired';
    protected $description = 'Update expired subscriptions and user statuses';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $now = Carbon::now();

        $subscriptions = Subscribe::where('rangeTime', '<=', $now)->get();

        foreach ($subscriptions as $subscribe) {
            $user = User::find($subscribe->idUser);
            if ($user) {
                $user->isPremium = false;
                $user->save();
            }
        }

        $this->info('Expired subscriptions updated successfully.');
    }
}
