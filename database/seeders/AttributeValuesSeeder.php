<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use DB;

class AttributeValuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => '1', 'value' => 'Su automatiniu prisukimu', 'attr_group_id' => '1'],
            ['id' => '2', 'value' => 'Su rankiniu prisukimu', 'attr_group_id' => '1'],
            ['id' => '3', 'value' => 'Kvarcinis nuo baterijos', 'attr_group_id' => '1'],
            ['id' => '4', 'value' => 'Kvarcinis nuo saulės baterijos', 'attr_group_id' => '1'],
            ['id' => '5', 'value' => 'Safyrinis', 'attr_group_id' => '2'],
            ['id' => '6', 'value' => 'Mineralinis', 'attr_group_id' => '2'],
            ['id' => '7', 'value' => 'Polimerinis', 'attr_group_id' => '2'],
            ['id' => '8', 'value' => 'Plieninis', 'attr_group_id' => '3'],
            ['id' => '9', 'value' => 'Odinis', 'attr_group_id' => '3'],
            ['id' => '10', 'value' => 'Kaučiukinis', 'attr_group_id' => '3'],
            ['id' => '11', 'value' => 'Polimerinis', 'attr_group_id' => '3'],
            ['id' => '12', 'value' => 'Nerūdijantis plienas', 'attr_group_id' => '4'],
            ['id' => '13', 'value' => 'Titaninis', 'attr_group_id' => '4'],
            ['id' => '14', 'value' => 'Žalvarinis', 'attr_group_id' => '4'],
            ['id' => '15', 'value' => 'Polimeras', 'attr_group_id' => '4'],
            ['id' => '16', 'value' => 'Keramika', 'attr_group_id' => '4'],
            ['id' => '17', 'value' => 'Aliuminis', 'attr_group_id' => '4'],
            ['id' => '18', 'value' => 'Analoginis', 'attr_group_id' => '5'],
            ['id' => '19', 'value' => 'Skaitmeninis', 'attr_group_id' => '5'],


        ];
        DB::table('attribute_values')->insert($data);
    }
}
