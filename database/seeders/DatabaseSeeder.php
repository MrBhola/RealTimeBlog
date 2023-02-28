<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Bhola',
             'email' => 'bhola@bro.com',
         ]);
         \App\Models\User::factory()->create([
             'name' => 'Bed',
             'email' => 'bed@bro.com',
         ]);
         \App\Models\User::factory()->create([
             'name' => 'Abiral',
             'email' => 'abi@bro.com',
         ]);
         \App\Models\User::factory()->create([
             'name' => 'Ashok',
             'email' => 'ashok@bro.com',
         ]);

         \App\Models\User::factory()->create([
             'name' => 'Sajan',
             'email' => 'sajan@bro.com',
         ]);
         \App\Models\User::factory()->create([
             'name' => 'Rajendra',
             'email' => 'rajendra@bro.com',
         ]);
         \App\Models\User::factory()->create([
             'name' => 'Bikram',
             'email' => 'bikram@bro.com',
         ]);
         \App\Models\User::factory()->create([
             'name' => 'Manish',
             'email' => 'manish@bro.com',
         ]);
         \App\Models\User::factory()->create([
             'name' => 'Kushal',
             'email' => 'kushal@bro.com',
         ]);
         \App\Models\User::factory()->create([
             'name' => 'Bibek',
             'email' => 'bebek@bro.com',
         ]);
         \App\Models\User::factory()->create([
             'name' => 'Sandip',
             'email' => 'sandip@bro.com',
         ]);
         \App\Models\User::factory()->create([
             'name' => 'Nirajan',
             'email' => 'nirajan@bro.com',
         ]);
        \App\Models\Post::factory(20)->create();
        \App\Models\Comment::factory(40)->create();
    }
}
