<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Link;
use App\Models\User;
class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::all()->each(function ($user) {
            Link::factory()->count(5)->create([
                'user_id' => $user->id,
            ]);
        });


    }
}
