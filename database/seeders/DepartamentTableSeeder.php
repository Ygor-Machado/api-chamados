<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departaments')->insert([
            [
                'name' => 'TI',
            ],
            [
                'name' => 'RH',
            ],
            [
                'name' => 'Contabilidade',
            ],
            [
                'name' => 'Finanças',
            ],
            [
                'name' => 'Juridico'
            ]
        ]);
    }
}
