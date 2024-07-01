<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Account;
use App\Models\Organizatio;
use App\Models\PostInfo;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $account = Account::create(['name' => 'Acme Corporation']);
        User::factory()->create([
            'account_id' => $account->id,
            'name' => 'Md Mazharul Islam',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
        ]);



        // \App\Models\User::factory(10)->create();

         User::factory(5)->create(['account_id' => $account->id]);

         $postinfo = PostInfo::factory(100)->create();
         $organizations = Organizatio::factory(100)
         ->create(['account_id' => $account->id]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
