<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            ['name'=>'Most Popular/Famous', 'gender'=>'BOTH'],
            ['name'=>'Most Amiable', 'gender'=>'BOTH'],
            ['name'=>'Gentleman of the season', 'gender'=>'BOTH'],
            ['name'=>'Most fashionable (Male)', 'gender'=>'MALE'],
            ['name'=>'Most fashionable (Female)', 'gender'=>'FEMALE'],
            ['name'=>'Most Versatile', 'gender'=>'BOTH'],
            ['name'=>'Most Active hall member', 'gender'=>'BOTH'],
            ['name'=>'Most Active Foreign student', 'gender'=>'BOTH'],
            ['name'=>'Face of KT (Male)', 'gender'=>'MALE'],
            ['name'=>'Face of KT (Female)', 'gender'=>'FEMALE'],
            ['name'=>'Best Roommates', 'gender'=>'BOTH'],
            ['name'=>'Ladies Man', 'gender'=>'BOTH'],
            ['name'=>'Best well dressed (Male)', 'gender'=>'MALE'],
            ['name'=>'Best well dressed (Female)', 'gender'=>'FEMALE'],
            ['name'=>'Most Elegant', 'gender'=>'BOTH'],
            ['name'=>'Best couple', 'gender'=>'BOTH'],
            ['name'=>'Most hardworking hall member (Male)', 'gender'=>'MALE'],
            ['name'=>'Most hardworking hall member (Female)', 'gender'=>'FEMALE']
        ]);
    }
}
