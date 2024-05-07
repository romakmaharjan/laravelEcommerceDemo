<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sectionData =[
            ['name'=>"Women's Fashion", 'order'=>1],
            ['name'=>"Health & Beauty", 'order'=>2],
            ['name'=>"Electronics", 'order'=>3],
            ['name'=>"Home & Living", 'order'=>4],

        ];
        foreach ($sectionData as $data) {
            $find = Section::where('name', $data['name'])->first();
            if (!$find) {
                Section::create($data);
            }
        }
    }
}