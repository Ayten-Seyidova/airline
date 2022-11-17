<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create([
            'id'=>1,
            'code'=>'az',
            'name'=>'Azərbaycan dili',
            'flag'=>'az'
        ]);
        Language::create([
            'id'=>2,
            'code'=>'en',
            'name'=>'English',
            'flag'=>'uk'
        ]);
        Language::create([
            'id'=>3,
            'code'=>'ru',
            'name'=>'Pусский',
            'flag'=>'russia'
        ]);
    }
}
