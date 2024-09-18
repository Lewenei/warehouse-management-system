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

        // Create the admin user
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'role_id' => 1, // Default role ID for admin
        ]);

        $this->info('Admin user created successfully!');
    }
}
