<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => '1', 'title' => 'Men','alias' => 'men', 'parent_id' => '0', 'keywords' => 'Men', 'description' => 'Men'],
            ['id' => '2', 'title' => 'Women','alias' => 'women', 'parent_id' => '0', 'keywords' => 'Women', 'description' => 'Women'],
            ['id' => '3', 'title' => 'Kids','alias' => 'kids', 'parent_id' => '0', 'keywords' => 'Kids', 'description' => 'Kids'],

            ['id' => '4', 'title' => 'Elektroniniai','alias' => 'elektroniniai', 'parent_id' => '1', 'keywords' => 'Elektroniniai', 'description' => 'elektroniniai'],
            ['id' => '5', 'title' => 'Mechaniniai','alias' => 'mechaniniai', 'parent_id' => '1', 'keywords' => 'Mechaniniai', 'description' => 'mechaniniai'],
            ['id' => '6', 'title' => 'Casio','alias' => 'casio', 'parent_id' => '4', 'keywords' => 'Casio', 'description' => 'Casio'],
            ['id' => '7', 'title' => 'Citizen','alias' => 'citizen', 'parent_id' => '4', 'keywords' => 'Citizen', 'description' => 'Citizen'],
            ['id' => '8', 'title' => 'Royal London','alias' => 'royal-london', 'parent_id' => '5', 'keywords' => 'Royal London', 'description' => 'Royal London'],
            ['id' => '9', 'title' => 'Seiko','alias' => 'seiko', 'parent_id' => '5', 'keywords' => 'Seiko', 'description' => 'Seiko'],
            ['id' => '10', 'title' => 'Epos','alias' => 'epos', 'parent_id' => '5', 'keywords' => 'Epos', 'description' => 'Epos'],
            ['id' => '11', 'title' => 'Elektroniniai','alias' => 'elektroniniai-11', 'parent_id' => '2', 'keywords' => 'Elektroniniai', 'description' => 'Elektroniniai'],
            ['id' => '12', 'title' => 'Mechaniniai','alias' => 'mechaniniai-12', 'parent_id' => '2', 'keywords' => 'Mechaniniai', 'description' => 'Mechaniniai'],
            ['id' => '13', 'title' => 'Adriatica','alias' => 'adriatica', 'parent_id' => '11', 'keywords' => 'Adriatica', 'description' => 'Adriatica'],
            ['id' => '14', 'title' => 'Anne Klein','alias' => 'anne-klein', 'parent_id' => '12', 'keywords' => 'Anne Klein', 'description' => 'Anne Klein'],

            ['id' => '15', 'title' => 'Mergaitėms','alias' => 'girls', 'parent_id' => '3', 'keywords' => 'girls', 'description' => 'girls'],
            ['id' => '16', 'title' => 'Berniukams','alias' => 'boys', 'parent_id' => '3', 'keywords' => 'boys', 'description' => 'boys'],

        ];

        DB::table('categories')->insert($data);
    }
}
