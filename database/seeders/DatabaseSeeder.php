<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
            $user=new User;
            $user->name="Admin";
            $user->password="AdminInvetaKB";
            $user->save();
    
            $user=new User;
            $user->name="Jefe";
            $user->password="Jefe1";
            $user->save();
        
    }
}
