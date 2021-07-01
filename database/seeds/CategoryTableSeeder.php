<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = ['Monde','Europe','France','Afrique','Moyen-Orient','Amériques','Asie Pacifique','Économie','Sports','Culture','Planète','Découvertes'];
        foreach($categories as $category){
            Category::create(['name'=>$category,'user_id'=>1]);
        }
    }
}
