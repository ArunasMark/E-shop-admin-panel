<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use DB;

class AttributeGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'title' => 'Mechanizmas',
            ],
            [
                'id' => '2',
                'title' => 'Stikliukas',
            ],
            [
                'id' => '3',
                'title' => 'Dirželis',
            ],
            [
                'id' => '4',
                'title' => 'Korpusas',
            ],
            [
                'id' => '5',
                'title' => 'Indikacija',
            ],
        ];
        DB::table('attribute_groups')->insert($data);
    }
}
