<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryData = [
            ['section_id'=>1, 'parent_id'=> null, 'name'=> "Clothing","slug"=>"clothing"],
            ['section_id'=>1, 'parent_id'=> null, 'name'=> "Shoes","slug"=>"shoes"],
            ['section_id'=>2, 'parent_id'=> null, 'name'=> "Makeup","slug"=>"makeup"],
            ['section_id'=>2, 'parent_id'=> null, 'name'=> "Haircare","slug"=>"haircare"],
            ['section_id'=>3, 'parent_id'=> null, 'name'=> "Tablets","slug"=>"tablets"],
        ];
        foreach ($categoryData as $data){
            $find = Category::where('name', $data['name'])->first();
            if(!$find) {
                Category::create($data);
            }
        }
    }
}