<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // Todo::factory(20)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            // UserSeeder::class,
            TodoSeeder::class,
            PostSeeder::class,
            // CategorySeeder::class,
        ]);
    }
}

//require enc type for form 
// php artisan storage:link
// if ($request->hasFile('photo')) {
//     // Delete old photo
//     Storage::disk('public')->delete($post->photo);

//     // Upload new photo
//     $photoPath = $request->file('photo')->store('photos', 'public');
//     $new['photo'] = $photoPath;
// }

// hw crud for post