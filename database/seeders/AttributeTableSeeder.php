<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Attribute;

class AttributeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attributeData = [
            ['attribute_name'=> 'Color'],
            ['attribute_name'=> 'Size'],
            ['attribute_name'=> 'Material'],
        ];
        foreach ($attributeData as $data){
            $find = Attribute::where('attribute_name',$data['attribute_name'])->first();
            if(!$find){
                Attribute::create($data);
            }
        }
    }
}