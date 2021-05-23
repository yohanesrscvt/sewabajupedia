<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // query builder for database

class size extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sizes')->insert([
            'SizeID' => 'S1',
            'DeskripsiSize' => 'XXS'
        ]);

        DB::table('sizes')->insert([
            'SizeID' => 'S2',
            'DeskripsiSize' => 'XS'
        ]);

        DB::table('sizes')->insert([
            'SizeID' => 'S3',
            'DeskripsiSize' => 'S'
        ]);

        DB::table('sizes')->insert([
            'SizeID' => 'S4',
            'DeskripsiSize' => 'M'
        ]);

        DB::table('sizes')->insert([
            'SizeID' => 'S5',
            'DeskripsiSize' => 'L'
        ]);

        DB::table('sizes')->insert([
            'SizeID' => 'S6',
            'DeskripsiSize' => 'XL'
        ]);

        DB::table('sizes')->insert([
            'SizeID' => 'S7',
            'DeskripsiSize' => 'XXL'
        ]);
    }
}
