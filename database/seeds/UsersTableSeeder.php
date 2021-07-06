<?php

use Illuminate\Database\Seeder;
use App\Model\User;
use APP\Model\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // create admin
         DB::table('users')->insert([

            'role_id' => DB::table('roles')->where('role_name', 'manager')->first()->role_id,           
            'name' => 'manager',
            'password' => bcrypt('root')  

        ]); 

        // create user
          DB::table('users')->insert([

            'role_id' => DB::table('roles')->where('role_name', 'user')->first()->role_id,           
            'name' => 'user',
            'password' => bcrypt('root')            
        ]); 

         // create manager
         DB::table('users')->insert([

            'role_id' => DB::table('roles')->where('role_name', 'admin')->first()->role_id,           
            'name' => 'admin',
            'password' => bcrypt('root')  
                      
        ]); 
        
    }
}
