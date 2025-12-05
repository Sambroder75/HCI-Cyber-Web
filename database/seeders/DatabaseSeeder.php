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
        // Inside run() function
        \App\Models\Post::create([
            'title' => 'Virus Sigma: The New Threat',
            'content' => 'Lorem ipsum dolor sit amet, virus sigma is attacking systems worldwide...',
            'category' => 'news',
            'image' => 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=2070'
        ]);

        \App\Models\Post::create([
            'title' => 'Why Zero Trust Matters',
            'content' => 'Analysis of the zero trust architecture in 2025...',
            'category' => 'analysis',
            'image' => 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?q=80&w=2070'
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
