<?php

namespace Modules\Alamat\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Alamat\Entities\Kabupaten;

class KabupatenDataSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kabupatens= [
            'Banyuwangi',
            'Maluku Tengah',
        ];

        Model::unguard();

        Kabupaten::truncate();

        foreach ($kabupatens as $value) {
            Kabupaten::create([
                'name' => $value
            ]);
        };
    }
}
