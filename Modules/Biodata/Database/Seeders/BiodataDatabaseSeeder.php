<?php

namespace Modules\Biodata\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class BiodataDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(MenuModulBiodataTableSeeder::class);
        $this->call(ReligionsDataSeederTableSeeder::class);
    }
}
