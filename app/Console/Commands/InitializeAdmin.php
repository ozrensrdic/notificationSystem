<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class InitializeAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create admin user';

    /**
     * @var User
     */
    protected $user;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        parent::__construct();

        $this->user = $user;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $details = $this->getDetails();

        $admin = $this->user->create($details);

        $this->info('Admin user has been created with the email: ' . $admin->email);
    }

    /**
     * @return array
     */
    protected function getDetails()
    {
        $details['name'] = $this->ask('Name');
        $details['surname'] = $this->ask('Surname');
        $details['email'] = $this->ask('Email');
        $details['password'] = $this->secret('Password');
        $details['confirm_password'] = $this->secret('Confirm password');
        $details['role_id'] = 'administrator';
        $valid = $this->isValidPassword($details['password'], $details['confirm_password'])
        ? 'same'
        : 'not';

        while (! $this->isValidPassword($details['password'], $details['confirm_password'])) {

            $this->error($valid .' pass ' . $details['password'] . ' conf ' . $details['confirm_password']);
            $this->error('Password must be at least 3 characters long and passwords must match.');

            $details['password'] = $this->secret('Password');
            $details['confirm_password'] = $this->secret('Confirm password');
        }

        $details['password'] = bcrypt($details['password']);

        return $details;
    }

    /**
     * Check if password is valid.
     *
     * @param string $password
     * @param string $confirmPassword
     * @return boolean
     */
    protected function isValidPassword(string $password, string $confirmPassword) : bool
    {
        return strlen($password) >= 3 && $password === $confirmPassword;
    }
}
