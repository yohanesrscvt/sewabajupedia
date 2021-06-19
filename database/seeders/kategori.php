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
            'KategoriNama' => 'Pesta',
            'KategoriPicturePath' => 'storage/kategori/party_dress.jpg'
        ]);

        DB::table('kategoris')->insert([
            'KategoriID' => 'K2',
            'KategoriNama' => 'Formal',
            'KategoriPicturePath' => 'storage/kategori/formal.jpg'
        ]);

        DB::table('kategoris')->insert([
            'KategoriID' => 'K3',
            'KategoriNama' => 'Adat',
            'KategoriPicturePath' => 'storage/kategori/adat.jpg'
        ]);

        DB::table('kategoris')->insert([
            'KategoriID' => 'K4',
            'KategoriNama' => 'Batik',
            'KategoriPicturePath' => 'storage/kategori/batik.jpg'
        ]);

        DB::table('kategoris')->insert([
            'KategoriID' => 'K5',
            'KategoriNama' => 'Cosplay',
            'KategoriPicturePath' => 'storage/kategori/cosplay.jpg'
        ]);

        DB::table('kategoris')->insert([
            'KategoriID' => 'K6',
            'KategoriNama' => 'Gaun',
            'KategoriPicturePath' => 'storage/kategori/dress.jpg'
        ]);

        DB::table('kategoris')->insert([
            'KategoriID' => 'K7',
            'KategoriNama' => 'Jas',
            'KategoriPicturePath' => 'storage/kategori/jas.jpg'
        ]);

        DB::table('kategoris')->insert([
            'KategoriID' => 'K8',
            'KategoriNama' => 'Baby',
            'KategoriPicturePath' => 'storage/kategori/baby.jpg'
        ]);

        DB::table('kategoris')->insert([
            'KategoriID' => 'K9',
            'KategoriNama' => 'Other/Lainnya',
            'KategoriPicturePath' => ''
        ]);

    }
}
