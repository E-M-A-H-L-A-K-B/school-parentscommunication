<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Stupid Command For Testing The User Table';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $headers = ['ID','Name','Last Name','Father'];

        $users = User::all(['id','name', 'last_name','father'])->toArray();

        $this->table($headers, $users);
    }
}
