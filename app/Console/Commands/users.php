<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class users extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add an admin user to the users database (one time use only!)';

    /**
     * Execute the console command.
     *
     * @return int
     */

    public function handle()
    {
        $password = "";
        $this->info("We Are Going To Guide You Through The Admin Creation Process: ");
        $name = readline("First Input The New Admin's First Name: ");
        $this->info("Good! ");
        $last_name = readline("Now Please Input The New Admin's Last Name: ");
        $this->info("Very Well! ");
        $father = readline("Almost There! Input The New Admin's Father Name: ");
        $this->info("One Thing Left! Do You Want To Input A Specific Password Or Do You Want It To Be Randomly Generated?");
        $choice = readline("(R)andom or (S)pecific?: ");

        //Testing For Wrong Input
        $test = false;
        while (!$test)
        {
            if ($choice == "R" || $choice == "r") 
            {
                $test = true;
                $this->info("Generating Random Password....");
                $password = Str::Random(8);
                $this->info("Password Generated!");
                $this->info("Admin Password Is: ".$password);
                $this->info("It Is Recommended That You Change This Password In The Near Future!");
                $this->info("Creating Admin......");
                $admin = new User();
                $admin->name = $name;
                $admin->last_name = $last_name;
                $admin->father = $father;
                $admin->admin = true;
                $admin->password = Hash::make($password);
                $admin->save();
                $this->info("Admin Created!");
                $this->info("Do Not Forget To Change The Password In The Near Future!");
                $this->info("It Is Reccommended That You Close This Session Immediatly!");
            }

            else if ($choice == "S" || $choice == "s") 
            {
                $test = true;
                $passtest = false;
                $equaltest = false;
                $password = $this->secret("Please Input The New Admin's Password: ");
                //Specifying Some Password Rules
                while (!$passtest) 
                {
                    $mintest = false;   //Check For Min Character Count
                    $capitaltest = false;   //Must Have A Capital Character
                    $numtest = false;   //Must Have At Least One Number
                    $specialtest = false; //Must Have At Least One Special Character

                    while (!$mintest || !$capitaltest || !$numtest || !$specialtest) 
                    {
                        if (strlen($password) < 8) 
                        {
                            $this->error("Password Must Be At Least 8 Characters Long");
                        }

                        else
                        {
                            $mintest = true;
                        }
                    
                        for ($i = 0; $i < strlen($password); $i++) 
                        {
                            if ($password[$i] >= 'A' && $password[$i] <= 'Z') 
                            {
                                $capitaltest = true;
                            }
                            if ($password[$i] >= '0' && $password[$i] <= '9') 
                            {
                                $numtest = true;
                            }
                            if(!($password[$i] >= 'A' && $password[$i] <= 'Z') && !($password[$i] >= 'a' && $password[$i] <= 'z') && !($password[$i] >= '0' && $password[$i] <= '9'))
                            {
                                $specialtest = true;
                            }
                        }

                        if(!$capitaltest)
                        {
                            $this->error("The Password Must Have At Least One Capital Character!");
                        }
                        if(!$numtest)
                        {
                            $this->error("The Password Must Contain At Least One Number!");
                        }
                        if(!$specialtest)
                        {
                            $this->error("The Password Must Contain At Least One Special Characeter!");
                        }

                        if(!$mintest || !$capitaltest || !$numtest || !$specialtest)
                        {
                            $mintest = false;
                            $capitaltest = false;
                            $numtest = false;
                            $specialtest = false;
                            $password = $this->secret("Please Re-Input The New Admin's Password: ");
                        }

                        else
                        {
                            $passtest = true;
                            $this->info("Password Accepted!");
                        }
                    }
                }
                
                $confirm = $this->secret("Confirm Password: ");
                while(!$equaltest)
                {
                    $etest = true;
                    if(strlen($confirm) != strlen($password))
                    {
                        $this->error("Passwords Do Not Match!");
                        $confirm = $this->secret("Confirm Password: ");
                    }
                    else
                    {
                        for($i=0;$i<strlen($confirm);$i++)
                        {
                            if($confirm[$i] != $password[$i])
                            {
                                $etest = false;
                            }
                        }

                        if(!$etest)
                        {
                            $this->error("Passwords Do Not Match!");
                            $confirm = $this->secret("Confirm Password: ");
                        }
                    }

                    if($etest)
                    {
                        $equaltest = true;
                        $this->info("Password Confirmed!");
                    }
                }

                $this->info("Creating Admin......");
                $admin = new User();
                $admin->name = $name;
                $admin->last_name = $last_name;
                $admin->father = $father;
                $admin->admin = true;
                $admin->password = Hash::make($password);
                $admin->save();
                $this->info("Admin Created!");
                $this->info("It Is Reccommended That You Close This Session Immediatly!");
            } 

            else 
            {
                $this->info("Please Input (S) or (R)!\n");
                $choice = readline("(R)andom or (S)pecific?: ");
            }
        }
    }
}
