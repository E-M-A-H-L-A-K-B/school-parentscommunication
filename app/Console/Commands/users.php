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
        echo "We Are Going To Guide You Through The Admin Creation Process:\n";
        $name = readline("First Input The New Admin's First Name: ");
        echo "Good!\n";
        $last_name = readline("Now Please Input The New Admin's Last Name: ");
        echo "Very Well!\n";
        $father = readline("Almost There! Input The New Admin's Father Name: ");
        echo "One Thing Left! Do You Want To Input A Specific Password Or Do You Want It To Be Randomly Generated?";
        $choice = readline("(R)andom or (S)pecific?: ");

        //Testing For Wrong Input
        $test = false;
        while (!$test)
        {
            if ($choice == "R" || $choice == "r") 
            {
                $test = true;
                echo "Generating Random Password....\n";
                $password = Str::Random(8);
                echo "Password Generated!";
                echo "Admin Password Is: ".$password."\n";
                echo "It Is Recommended That You Change This Password In The Near Future!\n";
                echo "Creating Admin......\n";
                $admin = new User();
                $admin->name = $name;
                $admin->last_name = $last_name;
                $admin->father = $father;
                $admin->admin = true;
                $admin->password = Hash::make($password);
                $admin->save();
                echo "Admin Created!\n";
                echo "Do Not Forget To Change The Password In The Near Future!\n";
                echo "It Is Reccommended That You Close This Session Immediatly!\n";
            }

            else if ($choice == "S" || $choice == "s") 
            {
                $test = true;
                $passtest = false;
                $equaltest = false;
                $password = readLine("Please Input The New Admin's Password: ");
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
                            echo "Password Must Be At Least 8 Characters Long\n";
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
                            echo "The Password Must Have At Least One Capital Character!\n";
                        }
                        if(!$numtest)
                        {
                            echo "The Password Must Contain At Least One Number!\n";
                        }
                        if(!$specialtest)
                        {
                            echo "The Password Must Contain At Least One Special Characeter!\n";
                        }

                        if(!$mintest || !$capitaltest || !$numtest || !$specialtest)
                        {
                            $mintest = false;
                            $capitaltest = false;
                            $numtest = false;
                            $specialtest = false;
                            $password = readLine("Please Re-Input The New Admin's Password: ");
                        }

                        else
                        {
                            $passtest = true;
                            echo "Password Accepted!\n";
                        }
                    }
                }
                
                $confirm = readline("Confirm Password: ");
                while(!$equaltest)
                {
                    $etest = true;
                    if(strlen($confirm) != strlen($password))
                    {
                        echo "Passwords Do Not Match!\n";
                        $confirm = readline("Confirm Password: ");
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
                            echo "Passwords Do Not Match!\n";
                            $confirm = readline("Confirm Password: ");
                        }
                    }

                    if($etest)
                    {
                        $equaltest = true;
                        echo "Password Confirmed!\n";
                    }
                }

                echo "Creating Admin......\n";
                $admin = new User();
                $admin->name = $name;
                $admin->last_name = $last_name;
                $admin->father = $father;
                $admin->admin = true;
                $admin->password = Hash::make($password);
                $admin->save();
                echo "Admin Created!\n";
                echo "It Is Reccommended That You Close This Session Immediatly!\n";
            } 

            else 
            {
                echo "Please Input (S) or (R)!\n";
                $choice = readline("(R)andom or (S)pecific?: ");
            }
        }
    }
}
