<?php

namespace Database\Seeders;

use App\Domains\Auth\Models\User;
use App\Models\Admin;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Add the master administrator, user id of 1
        Admin::query()->updateOrCreate(
            [
                'email' => 'admin@gmail.com',
            ],
            [
                'name' => 'admin',
                'password' => bcrypt('12345678a'),
                'email_verified_at' => now(),
            ]
        );
    }
}
