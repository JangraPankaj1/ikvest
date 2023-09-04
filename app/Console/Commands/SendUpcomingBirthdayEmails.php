<?php

namespace App\Console\Commands;

use App\Events\UpcomingBirthday;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendUpcomingBirthdayEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
     {
        $usersWithUpcomingBirthdays = User::whereMonth('birthday', Carbon::now()->addMonth()->month)
        ->whereDay('birthday', '>=', Carbon::now()->day)
        ->get();

        foreach ($usersWithUpcomingBirthdays as $user) {
            event(new UpcomingBirthday($user));
        }

     }

}
