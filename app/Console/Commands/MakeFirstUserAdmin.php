<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeFirstUserAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make-first-user-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make the first user in the database an admin';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = \App\Models\User::first();

        if ($user) {
            $user->role = 'admin';
            $user->save();
            $this->info('The first user (' . $user->email . ') has been made an admin.');
        } else {
            $this->error('No users found in the database.');
        }

        return 0;
    }
}
