<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;


class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installation command for Application';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Welcome to 2015 Election API');

        if (User::count() > 0)
        {
            $this->error('Application is already installed!');
            exit();
        }

        $this->createUser();
    }

    /**
     * Create a superuser for auth
     */
    private function createUser()
    {
        $name = $this->ask('Enter your fullname   ');

        $email = $this->getEmail();

        $password = $this->getPassword();

        $user = [
            'name'          => $name,
            'email'         => $email,
            'password'      => bcrypt($password),
            'status'        => 'a',
            'role'          => 'admin',
        ];

        $user = User::create($user, true);

        if ($user) {
            $this->info('Admin user is created. Thanks for installation '.$name);
        } else {
            $this->error('User could not be created.');
        }
    }

    /**
     * Get email address from user input
     * @return string
     */
    protected function getEmail()
    {
        $email = $this->ask('Enter your email address');
        
        if ( ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->error('Email format is invalid');
            $this->getEmail();
        }

        return $email;
    }

    /**
     * Get password from user input
     * @return string
     */
    protected function getPassword()
    {
        $password  = $this->secret('Enter a password (min 6)      ');
        
        if ( strlen($password) < 6) {
            $this->error('Minimum length of password is 6');
            $this->getPassword();
        }

        return $password;
    }

}
