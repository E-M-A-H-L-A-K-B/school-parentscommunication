<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class update_user extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:update-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Testing User Update';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::findorfail(1);
        $user->name = 'سليمان';
        $user->save();
    }
}
