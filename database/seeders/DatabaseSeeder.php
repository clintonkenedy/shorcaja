<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        // \App\Models\User::factory(10)->create();

        //  \App\Models\User::factory()->create([
        //      'email' => 'admin@gmail.com',
        //      'password' =>  bcrypt('administrador'),
        //  ]);

         for( $i=1000;$i<=1320;$i++){
             \App\Models\Ticket::create([
                 'codigo'=> $i,
                 'estado'=>'Libre',
             ]);
         }
         for( $i=1;$i<=800;$i++){
            \App\Models\Ticket::create([
                'codigo'=> $i,
                'estado'=>'Libre',
            ]);
        }
    }
}
