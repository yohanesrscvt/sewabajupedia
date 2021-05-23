<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB; // query builder for database

class kategori extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategoris')->insert([
            'KategoriID' => 'K1',
            'KategoriNama' => 'Pesta'
        ]);

        DB::table('kategoris')->insert([
            'KategoriID' => 'K2',
            'KategoriNama' => 'Formal'
        ]);

        DB::table('kategoris')->insert([
            'KategoriID' => 'K3',
            'KategoriNama' => 'Adat'
        ]);

        DB::table('kategoris')->insert([
            'KategoriID' => 'K4',
            'KategoriNama' => 'Batik'
        ]);

        DB::table('kategoris')->insert([
            'KategoriID' => 'K5',
            'KategoriNama' => 'Cosplay'
        ]);

        DB::table('kategoris')->insert([
            'KategoriID' => 'K6',
            'KategoriNama' => 'Gaun'
        ]);

        DB::table('kategoris')->insert([
            'KategoriID' => 'K7',
            'KategoriNama' => 'Jas'
        ]);

        DB::table('kategoris')->insert([
            'KategoriID' => 'K8',
            'KategoriNama' => 'Baby'
        ]);

        DB::table('kategoris')->insert([
            'KategoriID' => 'K9',
            'KategoriNama' => 'Other/Lainnya'
        ]);

    }
}
