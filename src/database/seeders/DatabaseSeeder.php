<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
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
        // ユーザーを作成
        $users = User::factory(5)->create();

        // 各ユーザーに対して勤怠データを作成
        $users->each(function ($user) {
            Address::factory(1)->create(['user_id' => $user->user_id]);
        });
    }
}
