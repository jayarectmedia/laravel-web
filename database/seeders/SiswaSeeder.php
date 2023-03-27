<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('siswas')->insert([
            'name' => "udin",
            'nomor_induk' => "0001",
            "alamat" => "jawa",
            "created_at" => date('Y-m-d H:i:s'),
        ]);
        DB::table('siswas')->insert([
            'name' => "yows",
            'nomor_induk' => "0002",
            "alamat" => "jawa",
            "created_at" => date('Y-m-d H:i:s'),
        ]);
        DB::table('siswas')->insert([
            'name' => "been",
            'nomor_induk' => "0003",
            "alamat" => "jawa",
            "created_at" => date('Y-m-d H:i:s'),
        ]);
    }
}
