<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateAdmin extends Command
{
    protected $signature = 'create:admin';
    protected $description = 'Create a new admin user interactively';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Prompt for user input
        $name = $this->ask('Enter the name of the admin');
        $email = $this->ask('Enter the email of the admin');
        $password = $this->secret('Enter the password for the admin');

        // Check if email already exists
        if (User::where('email', $email)->exists()) {
            $this->error('An account with this email already exists.');
            return;
        }

        // Create the admin user
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'role' => 'admin', // Assign 'admin' role
        ]);

        $this->info('Admin user created successfully!');
    }
}
