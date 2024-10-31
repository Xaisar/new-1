<?php

namespace Modules\Biodata\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Biodata\Entities\Religions;

class ReligionsDataSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $religions= [
            'Islam',
            'Kristen',
            'Katolik',
            'Hindu',
            'Buddha',
            'Khonghucu'
        ];

        Model::unguard();

        Religions::truncate();

        foreach ($religions as $value) {
            Religions::create([
                'name' => $value
            ]);
        };
    }
}
