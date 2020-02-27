<?php

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::unprepared('SET FOREIGN_KEY_CHECKS=0');
        Category::query()->truncate();
        Category::query()->insert([
            ['id'=>1,'name'=>'Most Popular/Famous', 'gender'=>'BOTH'],
            ['id'=>2,'name'=>'Most Amiable', 'gender'=>'BOTH'],
            ['id'=>3,'name'=>'Gentleman of the season', 'gender'=>'BOTH'],
            ['id'=>4,'name'=>'Most fashionable (Male)', 'gender'=>'MALE'],
            ['id'=>5,'name'=>'Most fashionable (Female)', 'gender'=>'FEMALE'],
            ['id'=>6,'name'=>'Most Versatile', 'gender'=>'BOTH'],
            ['id'=>7,'name'=>'Most Active hall member', 'gender'=>'BOTH'],
            ['id'=>8,'name'=>'Most Active Foreign student', 'gender'=>'BOTH'],
            ['id'=>9,'name'=>'Face of KT (Male)', 'gender'=>'MALE'],
            ['id'=>10,'name'=>'Face of KT (Female)', 'gender'=>'FEMALE'],
            ['id'=>11,'name'=>'Best Roommates', 'gender'=>'BOTH'],
            ['id'=>12,'name'=>'Ladies Man', 'gender'=>'BOTH'],
            ['id'=>13,'name'=>'Best well dressed (Male)', 'gender'=>'MALE'],
            ['id'=>14,'name'=>'Best well dressed (Female)', 'gender'=>'FEMALE'],
            ['id'=>15,'name'=>'Most Elegant', 'gender'=>'BOTH'],
            ['id'=>16,'name'=>'Best couple', 'gender'=>'BOTH'],
            ['id'=>17,'name'=>'Most hardworking hall member (Male)', 'gender'=>'MALE'],
            ['id'=>18,'name'=>'Most hardworking hall member (Female)', 'gender'=>'FEMALE'],
            ['id'=>19,'name'=>'Best Entrepreneur', 'gender'=>'BOTH']
        ]);
        DB::unprepared('SET FOREIGN_KEY_CHECKS=1');
    }
}
