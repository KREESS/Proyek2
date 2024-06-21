<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Periksa apakah pengguna dengan email 'test@example.com' sudah ada
        $existingUser = User::where('email', 'test@example.com')->first();

        if (!$existingUser) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
        } else {
            // Pengguna sudah ada, cetak pesan atau lakukan tindakan lain sesuai kebutuhan
            echo "Pengguna dengan email 'test@example.com' sudah ada.\n";
        }

        // Panggil seeder untuk update SoalTryout
        $this->call(UpdateSoalTryoutMateriIdSeeder::class);
    }
}
