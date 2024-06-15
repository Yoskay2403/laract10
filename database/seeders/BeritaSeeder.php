<?php

namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i =0; $i < 10; $i++) {
        DB::table('berita')->insert([
            'media' => fake()->text(),
            'headline_berita' => fake()->text(),
            'isi_berita' => fake()->paragraph(3, true),
            'tanggal_publikasi' => fake()->dateTime(),
            'coresponden' => fake()->text(),
        ]);
    }
  }
}