<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Level;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Level::updateOrCreate(
            ['level_kode' => 'ADM'],
            ['level_nama' => 'Administrator']
        );

        Level::updateOrCreate(
            ['level_kode' => 'KSR'],
            ['level_nama' => 'Kasir']
        );
    }
}
