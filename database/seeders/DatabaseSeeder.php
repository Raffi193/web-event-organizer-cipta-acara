<?php

namespace Database\Seeders;

use App\Models\Decoration;
use App\Models\MasterOfCeremony;
use App\Models\Photographer;
use App\Models\Pricelist;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
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

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::insert([
            [
                'name' => 'Budi Santoso',
                'email' => 'budi@momentaeo.id',
                'password' => bcrypt('budimomen'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Santi',
                'email' => 'santi@momentaeo.id',
                'password' => bcrypt('santimomen'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        Photographer::insert([
            [
                'name' => '-',
                'slug' => Str::slug('blank'),
                'services' => '-',
                'contact' => '-',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Lensa Momen',
                'slug' => Str::slug('Lensa Momen'),
                'services' => 'Melayani foto dan video wisuda, wedding, dan acara coorporate',
                'contact' => '081234567890',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Gas Jepret',
                'slug' => Str::slug('Gas Jepret'),
                'services' => 'Melayani foto hunting dan pernikahan luar negeri',
                'contact' => '081234567891',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        MasterOfCeremony::insert([
            [
                'name' => '-',
                'slug' => Str::slug('blank'),
                'services' => '-',
                'contact' => '-',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Abi Suganda',
                'slug' => Str::slug('Abi Suganda'),
                'services' => 'Melayani MC acara ulang tahun dan pernikahan',
                'contact' => '081234567892',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Astri Pratiwi',
                'slug' => Str::slug('Astri Pratiwi'),
                'services' => 'Melayani MC acara coorporate dan resmi',
                'contact' => '081234567893',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        Decoration::insert([
            [
                'name' => '-',
                'slug' => Str::slug('blank'),
                'services' => '-',
                'contact' => '-',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Bagus Decoration',
                'slug' => Str::slug('Bagus Decoration'),
                'services' => 'Melayani dekorasi pernikahan dan lamaran',
                'contact' => '081234567894',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Mewah Decoration',
                'slug' => Str::slug('Mewah Decoration'),
                'services' => 'Melayani dekorasi custom sesuai permintaan',
                'contact' => '081234567895',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        Pricelist::insert([
            [
                'title' => 'Standard',
                'slug' => Str::slug('Standard'),
                'description' => 'Paket standar yang hemat biaya dan praktis',
                'price' => 2000000,
                'master_of_ceremony_id' => 1,
                'photographer_id' => 3,
                'decoration_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Medium',
                'slug' => Str::slug('Medium'),
                'description' => 'Paket standar yang hemat biaya terkonsep',
                'price' => 3500000,
                'master_of_ceremony_id' => 2,
                'photographer_id' => 2,
                'decoration_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

    }
}
