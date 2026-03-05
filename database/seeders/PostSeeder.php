<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Post::create([
            'title' => 'Innovación en PHP 8.4',
            'slug' => 'innovacion-php-8-4',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'is_published' => true,
        ]);

        \App\Models\Post::create([
            'title' => 'GSAP y el Futuro del Web',
            'slug' => 'gsap-futuro-web',
            'content' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'is_published' => true,
        ]);

        \App\Models\Post::create([
            'title' => 'Sistemas de Comunicación',
            'slug' => 'sistemas-comunicacion',
            'content' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
            'is_published' => true,
        ]);
    }
}
