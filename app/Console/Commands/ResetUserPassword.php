<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ResetUserPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reset-user-password {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Resets the password for a specific user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');
        $password = $this->argument('password');

        $user = User::where('email', $email)->first();

        if (!$user) {
            $this->error('User with email ' . $email . ' not found.');
            return 1;
        }

        $user->password = Hash::make($password);
        $user->save();

        $this->info('Password for ' . $email . ' has been reset successfully.');

        return 0;
    }
}
