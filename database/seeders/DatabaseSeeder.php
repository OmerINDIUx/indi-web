<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::query()
            ->where('email', 'omer.tenahua@grupoindi.com')
            ->first();

        if (! $admin) {
            User::query()
                ->where('email', 'admin@grupoindi.com')
                ->first()?->delete();

            User::query()->create([
                'name' => 'Omer Tenahua',
                'email' => 'omer.tenahua@grupoindi.com',
                'password' => bcrypt('Zmka6679.'),
            ]);
        }

        $this->call(ProjectSeeder::class);
    }
}
